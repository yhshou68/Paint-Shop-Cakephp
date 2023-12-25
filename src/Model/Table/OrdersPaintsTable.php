<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrdersPaints Model
 *
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 * @property \App\Model\Table\PaintsTable&\Cake\ORM\Association\BelongsTo $Paints
 *
 * @method \App\Model\Entity\OrdersPaint newEmptyEntity()
 * @method \App\Model\Entity\OrdersPaint newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\OrdersPaint> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrdersPaint get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\OrdersPaint findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\OrdersPaint patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\OrdersPaint> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrdersPaint|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\OrdersPaint saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\OrdersPaint>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OrdersPaint>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\OrdersPaint>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OrdersPaint> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\OrdersPaint>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OrdersPaint>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\OrdersPaint>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OrdersPaint> deleteManyOrFail(iterable $entities, array $options = [])
 */
class OrdersPaintsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('orders_paints');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Paints', [
            'foreignKey' => 'paint_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('order_id')
            ->notEmptyString('order_id');

        $validator
            ->integer('paint_id')
            ->notEmptyString('paint_id');

        $validator
            ->integer('quantity')
            ->allowEmptyString('quantity');

        $validator
            ->decimal('subtotal')
            ->allowEmptyString('subtotal');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('order_id', 'Orders'), ['errorField' => 'order_id']);
        $rules->add($rules->existsIn('paint_id', 'Paints'), ['errorField' => 'paint_id']);

        return $rules;
    }
}
