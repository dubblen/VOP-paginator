<?php

namespace App\Presenters;

use Nette;
use Nette\Database\Context;


class ArticlePresenter extends Nette\Application\UI\Presenter
{

	private $database;

	public function __construct(Context $database)
	{
		$this->database = $database;
	}

	public function renderDefault($articleId) {
		$article = $this->database->table("articles")->get($articleId);

		$this->template->article = $article;
	}
}
