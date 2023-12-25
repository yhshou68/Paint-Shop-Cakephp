<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Storages Model
 *
 * @property \App\Model\Table\PaintsTable&\Cake\ORM\Association\BelongsToMany $Paints
 *
 * @method \App\Model\Entity\Storage newEmptyEntity()
 * @method \App\Model\Entity\Storage newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Storage> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Storage get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Storage findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Storage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Storage> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Storage|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Storage saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Storage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Storage>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Storage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Storage> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Storage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Storage>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Storage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Storage> deleteManyOrFail(iterable $entities, array $options = [])
 */
class StoragesTable extends Table
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

        $this->setTable('storages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Paints', [
            'foreignKey' => 'storage_id',
            'targetForeignKey' => 'paint_id',
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
            ->scalar('location')
            ->maxLength('location', 255)
            ->allowEmptyString('location');

        $validator
            ->integer('capacity')
            ->allowEmptyString('capacity');

        $validator
            ->integer('warning_threshold')
            ->allowEmptyString('warning_threshold');

        return $validator;
    }
}
