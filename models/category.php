<?php

class category 
{
	private $BLOG = null;
	public $id = null;
	public $bean = null;
	
	public function __construct ($blog, $id='')
	{
		$this->BLOG = $blog;
		
		if (!$idINT = intval($id))
		{
			$category = R::dispense('category');
			$category->name = $id;
			$category->position = count(R::findAll('category'));
			$this->id = R::store($category);
		}
		else
			$this->id = $idINT;
		
		$this->bean = R::load('category', $this->id);
	}
	
	public function editPosition($position)
	{
		$this->bean->position = $position;
		R::store($this->bean);
	}
		
	public function attachTo ($post, $order='')
	{
		if ($order)
			$post->categoryOrder[$this->id] = $order;
		R::store($post);
		R::associate($post, $this->bean);
	}
	
	public function removeFrom ($post)
	{
		if ($post->categoryOrder)
			unset($post->categoryOrder[$this->id]);
		R::store($post);
		R::unassociate($post, $this->bean);
	}
	
	public function delete ()
	{		
		$posts = R::related($this->bean, 'post');
		
		foreach ($posts as $p) 
		{
			if ($p->categoryOrder)
				unset($p->categoryOrder[$id]);
			R::store($p);
		}
		
		R::clearRelations($this->bean, 'post');
		R::trash($this->bean);
		unset($this);
	}
	
	public static function exists($name)
	{
		if ($c = R::findOne('category', ' name = :catName', array('catName' => $name)))
			return $c->id;
	}
	
	public static function getAttachmentsFrom ($post)
	{
		return R::related($post, 'category');
	}
	
	public static function getAttachmentsOrderFrom ($post)
	{
		return $post->categoryOrder;
	}
	
	public static function explore ($post=null)
	{
		if (!is_null($post))
		{
			return R::unrelated($post, 'category');
		}
		else
			return R::findAll('category', ' ORDER BY position ASC');
	}

}
