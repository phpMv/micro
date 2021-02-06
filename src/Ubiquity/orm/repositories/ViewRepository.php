<?php

namespace Ubiquity\orm\repositories;

use Ubiquity\controllers\Controller;
use Ubiquity\orm\DAO;
use Ubiquity\views\View;

/**
 * A repository for managing CRUD operations on a model, displayed in a view.
 * Ubiquity\orm\repositories$ViewRepository
 * This class is part of Ubiquity
 *
 * @author jc
 * @version 1.0.0
 *
 */
class ViewRepository {
	private string $model;
	private View $view;

	public function __construct(Controller $ctrl, string $model) {
		$this->view = $ctrl->getView ();
		$this->model = $model;
	}

	/**
	 * Load all instances in a view variable named all.
	 *
	 * @param string $condition
	 * @param string|boolean $included
	 * @param array $parameters
	 * @param bool $useCache
	 * @param string $viewVar
	 */
	public function all(string $condition = '', $included = false, array $parameters = [ ], bool $useCache = false, string $viewVar = 'all') {
		$this->view->setVar ( $viewVar, DAO::getAll ( $this->model, $condition, $included, $parameters, $useCache ) );
	}

	/**
	 * Load one instance by id in a view variable named byId.
	 *
	 * @param $keyValues
	 * @param bool|string $included
	 * @param bool $useCache
	 * @param string $viewVar
	 */
	public function byId($keyValues, $included = true, bool $useCache = false, string $viewVar = 'byId') {
		$this->view->setVar ( $viewVar, DAO::getById ( $this->model, $keyValues, $included, $useCache ) );
	}

	/**
	 * Load one instance in a view variable named one.
	 *
	 * @param string $condition
	 * @param bool|string $included
	 * @param bool $useCache
	 * @param string $viewVar
	 * @throws \Ubiquity\exceptions\DAOException
	 */
	public function one(string $condition = '', $included = true, bool $useCache = false, string $viewVar = 'one') {
		$this->view->setVar ( $viewVar, DAO::getOne ( $this->model, $condition, $included, $useCache ) );
	}

	/**
	 * Insert a new instance $instance into the database and add the instance in a view variable.
	 *
	 * @param object $instance
	 * @param bool $insertMany
	 * @param string $viewVar
	 * @return bool
	 * @throws \Exception
	 */
	public function insert(object $instance, $insertMany = false, string $viewVar = 'inserted'): bool {
		$r = DAO::insert ( $instance, $insertMany );
		$this->view->setVar ( $viewVar, $instance );
		return $r;
	}

	/**
	 * Update an instance $instance in the database and add the instance in a view variable.
	 *
	 * @param object $instance
	 * @param bool $insertMany
	 * @param string $viewVar
	 * @return bool
	 */
	public function update(object $instance, $insertMany = false, string $viewVar = 'updated'): bool {
		$r = DAO::update ( $instance, $insertMany );
		$this->view->setVar ( $viewVar, $instance );
		return $r;
	}

	/**
	 * Save (insert or update) an instance $instance in the database and add the instance in a view variable.
	 *
	 * @param object $instance
	 * @param bool $insertMany
	 * @param string $viewVar
	 * @return bool|int
	 */
	public function save(object $instance, $insertMany = false, string $viewVar = 'saved') {
		$r = DAO::save ( $instance, $insertMany );
		$this->view->setVar ( $viewVar, $instance );
		return $r;
	}

	/**
	 * Remove an instance $instance from the database and add the instance in a view variable.
	 *
	 * @param object $instance
	 * @param string $viewVar
	 * @return int|null
	 */
	public function remove(object $instance, string $viewVar = 'removed'): ?int {
		$r = DAO::remove ( $instance );
		$this->view->setVar ( $viewVar, $instance );
		return $r;
	}
}