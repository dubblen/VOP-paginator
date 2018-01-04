<?php

namespace App\Presenters;

use Nette;
use Nette\Utils\Paginator;
use Nette\Database\Context;


class HomepagePresenter extends Nette\Application\UI\Presenter
{

	private $database;

	public function __construct(Context $database)
	{
		$this->database = $database;
	}

	public function renderDefault($page = 1) {
		$paginator = new Paginator;

		$articlesCount = $this->database->table("articles")->count();
		$articlesPerPage = 10;

		$paginator->setItemCount($articlesCount); // celkový počet článků
		$paginator->setItemsPerPage($articlesPerPage); // počet položek na stránce
		$paginator->setPage($page); // číslo aktuální stránky

		$articles = $this->database->table("articles")->limit($articlesPerPage, $paginator->getOffset());

		$this->template->articles = $articles;
		$this->template->paginator = $paginator;
	}
}
