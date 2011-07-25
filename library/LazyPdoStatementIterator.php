<?php

class LazyPdoStatementIterator implements Iterator
{
	public function __construct(PDOStatement $statement)
	{
		$this->_stmt = $statement;
		$this->rewind();
	}

	public function current()
	{
		return $this->_current;
	}

	public function key()
	{
		return $this->_key;
	}

	public function next()
	{
		if (!$this->_executed) {
			$this->_stmt->execute();
			$this->_executed = true;
		}

		$this->_current = $this->_stmt->fetch();
		$this->_key++;
	}

	public function rewind()
	{
		$this->_key = -1;
		$this->_current = false;
		$this->_executed = false;
	}

	public function valid()
	{
		if (!$this->_executed) {
			$this->next();
		}

		return $this->_current !== false;
	}

	public function getStatement()
	{
		return $this->_stmt;
	}
}
