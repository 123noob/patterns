<?php
/**
组合模式
*/

abstract class MenuComponent {

}

class MenuItem extends MenuComponent {
	public $name;

	function __construct($name) {
		$this->name = $name;
	}

	function show() {
		echo " |-".$this->name."<br>";
	}

}

class Menu extends MenuComponent {
	public $name;
	public $menuComponents = array(); 

	function __construct($name) {
		$this->name = $name;
	}

	function add(MenuComponent $menuComponent) {
		$this->menuComponents[] = $menuComponent;
	}

	function remove(MenuComponent $menuComponent) {
		$key = array_search($menuComponent, $this->menuComponents);
		if($key !== false){
			unset($this->menuComponents[$key]);
		}
	}

	function show() {
		echo $this->name."<br>";
		foreach ($this->menuComponents as $menu) {
			$menu->show();
		}
	}
}

class testDriver  
{  
    public function run()  
    {  
        $menu1 = new Menu('文学');  

        $menuitem1 = new MenuItem('绘画');  
        $menuitem2 = new MenuItem('书法');  
        $menuitem3 = new MenuItem('小说');  
        $menuitem4 = new MenuItem('雕刻');  
        $menu1->add($menuitem1);  
        $menu1->add($menuitem2);  
        $menu1->add($menuitem3);  
        $menu1->add($menuitem4);  
        $menu1->show();  
    }  
}  
  
$test = new testDriver();  
$test->run();  