<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Paints Model
 *
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsToMany $Orders
 * @property \App\Model\Table\StoragesTable&\Cake\ORM\Association\BelongsToMany $Storages
 *
 * @method \App\Model\Entity\Paint newEmptyEntity()
 * @method \App\Model\Entity\Paint newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Paint> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Paint get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Paint findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Paint patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Paint> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Paint|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Paint saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Paint>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Paint>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Paint>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Paint> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Paint>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Paint>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Paint>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Paint> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PaintsTable extends Table
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

        $this->setTable('paints');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Orders', [
            'foreignKey' => 'paint_id',
            'targetForeignKey' => 'order_id',
            'joinTable' => 'orders_paints',
        ]);
        $this->belongsToMany('Storages', [
            'foreignKey' => 'paint_id',
            'targetForeignKey' => 'storage_id',
            'joinTable' => 'paints_storages',
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
            ->scalar('color')
            ->maxLength('color', 50)
            ->allowEmptyString('color');

        $validator
            ->scalar('type')
            ->maxLength('type', 50)
            ->allowEmptyString('type');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->decimal('price')
            ->allowEmptyString('price');

        return $validator;
    }
}
