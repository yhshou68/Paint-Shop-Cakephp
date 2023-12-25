<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PaintsStorages Model
 *
 * @property \App\Model\Table\PaintsTable&\Cake\ORM\Association\BelongsTo $Paints
 * @property \App\Model\Table\StoragesTable&\Cake\ORM\Association\BelongsTo $Storages
 *
 * @method \App\Model\Entity\PaintsStorage newEmptyEntity()
 * @method \App\Model\Entity\PaintsStorage newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\PaintsStorage> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PaintsStorage get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\PaintsStorage findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\PaintsStorage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\PaintsStorage> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PaintsStorage|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\PaintsStorage saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\PaintsStorage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PaintsStorage>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PaintsStorage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PaintsStorage> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PaintsStorage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PaintsStorage>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PaintsStorage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PaintsStorage> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PaintsStoragesTable extends Table
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

        $this->setTable('paints_storages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Paints', [
            'foreignKey' => 'paint_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Storages', [
            'foreignKey' => 'storage_id',
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
            ->integer('paint_id')
            ->notEmptyString('paint_id');

        $validator
            ->integer('storage_id')
            ->notEmptyString('storage_id');

        $validator
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmptyDate('start_date');

        $validator
            ->date('end_date')
            ->allowEmptyDate('end_date');

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
        $rules->add($rules->existsIn('paint_id', 'Paints'), ['errorField' => 'paint_id']);
        $rules->add($rules->existsIn('storage_id', 'Storages'), ['errorField' => 'storage_id']);

        return $rules;
    }
}
