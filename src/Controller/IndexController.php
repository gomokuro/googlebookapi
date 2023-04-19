<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\I18n\FrozenTime;
use Cake\View\Exception\MissingTemplateException;
use PhpParser\Node\Expr\FuncCall;

/**
 *@param SearchBookHistories $SearchBookHistories
 */
class IndexController extends AppController
{

    public function initialize(): void {
		parent::initialize();
		$this->SearchBookHistories = $this->fetchTable('SearchBookHistories');
	}


    public function index(){
        $searchHistories = $this->SearchBookHistories->find()->select(['id','search_word'])->order('search_datetime desc');
        $this->set(compact('searchHistories'));
    }

    public function search($word){

        if(empty($word)){
           throw new NotFoundException(); 
        }

        $books = [];
       
        $url = 'https://www.googleapis.com/books/v1/volumes?q='.$word;
        $json = file_get_contents($url);

        $result = json_decode($json);

        
        foreach($result->items as $index=>$item){
            $books[] = $item;
            if($index == 10) break;
        }

        if(!empty($books)) {
            //検索日時と検索ワードと検索結果を保存
            $this->SearchBookHistories->insertHistory($word,$books);
        }

        $this->set(compact('books'));
    }


    public function searchHistory($word){

        if(empty($word)){
           throw new NotFoundException(); 
        }
        $books = [];
        if($this->SearchBookHistories->exists(['search_word'=>$word])){
            $history = $this->SearchBookHistories->find()->where(['search_word'=>$word])->first();
            $books = $history->search_result;
            $this->set('searchDatetime',$history->search_datetime->format('Y/m/d H:i'));

        }
        $this->set(compact('books'));
        $this->render('search');
    }

    public function getWordArea(){
        $searchHistories = $this->SearchBookHistories->find()->select(['id','search_word'])->order('search_datetime desc');
        $this->set(compact('searchHistories'));
    }
}
