<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up(): void
    {
        $this->table('search_book_histories', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'uuid', [
                'comment' => 'ID',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('search_datetime', 'datetime', [
                'comment' => '検索日時',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('search_word', 'string', [
                'comment' => '検索ワード',
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('search_result', 'text', [
                'comment' => '検索結果',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down(): void
    {
        $this->table('search_book_histories')->drop()->save();
    }
}
