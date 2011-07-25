<?php

class LazyCallbackOuterIterator extends IteratorIterator
{
	protected $_callbacks = array();

	public function applyEach($callable)
	{
		if (!is_callable($callable)) {
			throw new InvalidArgumentException('First parameter to pushCallback must be callable');
		}

		$this->_callbacks[] = $callable;
	}

	public function current()
	{
		$tmp = parent::current();
		foreach ($this->_callbacks as $callback) {
			$tmp = call_user_func($callback, $tmp);
		}
		return $tmp;
	}
}
