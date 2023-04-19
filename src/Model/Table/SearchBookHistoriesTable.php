<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\FrozenTime;

/**
 * SearchBookHistories Model
 *
 * @method \App\Model\Entity\SearchBookHistory newEmptyEntity()
 * @method \App\Model\Entity\SearchBookHistory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SearchBookHistory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SearchBookHistory get($primaryKey, $options = [])
 * @method \App\Model\Entity\SearchBookHistory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SearchBookHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SearchBookHistory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SearchBookHistory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SearchBookHistory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SearchBookHistory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SearchBookHistory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SearchBookHistory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SearchBookHistory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SearchBookHistoriesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('search_book_histories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    protected function _initializeSchema(\Cake\Database\Schema\TableSchemaInterface $schema):\Cake\Database\Schema\TableSchemaInterface {
		parent::_initializeSchema($schema);

		$schema->setColumnType('search_result', 'JsonObject');

        return $schema;
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
            ->dateTime('search_datetime')
            ->requirePresence('search_datetime', 'create')
            ->notEmptyDateTime('search_datetime');

        $validator
            ->scalar('search_word')
            ->maxLength('search_word', 100)
            ->requirePresence('search_word', 'create')
            ->notEmptyString('search_word');

        $validator
            ->scalar('search_result')
            ->requirePresence('search_result', 'create')
            ->notEmptyString('search_result');

        return $validator;
    }


    public function insertHistory($searchWord, $resultData){
        $newEntity = $this->newEmptyEntity();
        $newEntity->search_datetime = FrozenTime::now();
        $newEntity->search_word = $searchWord;
        $newEntity->search_result = $resultData;
        return $this->save($newEntity);
    }
}
