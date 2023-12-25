<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shipments Model
 *
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\Shipment newEmptyEntity()
 * @method \App\Model\Entity\Shipment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Shipment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Shipment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Shipment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Shipment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Shipment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Shipment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Shipment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Shipment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Shipment>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Shipment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Shipment> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Shipment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Shipment>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Shipment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Shipment> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ShipmentsTable extends Table
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

        $this->setTable('shipments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
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
            ->integer('seq_num')
            ->requirePresence('seq_num', 'create')
            ->notEmptyString('seq_num');

        $validator
            ->integer('customer_id')
            ->allowEmptyString('customer_id');

        $validator
            ->scalar('type')
            ->maxLength('type', 50)
            ->allowEmptyString('type');

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
        $rules->add($rules->existsIn('customer_id', 'Customers'), ['errorField' => 'customer_id']);

        return $rules;
    }
}
