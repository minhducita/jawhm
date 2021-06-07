<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to 'column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	/**
	 *@var meta for SEO
	 */
	public $pageTitle = '';
    public $pageDesc = '';
    public $keyword = '';

    public $pageOgTitle = '';
    public $pageOgDesc = '';
    public $pageOgImage = '';

    // Displays SEO-related Variables
	public function display_seo()
	{
	    // STANDARD TAGS
	    // -------------------------
	    // Title/Desc
	    echo "t".''.PHP_EOL;
	    echo "t".''.PHP_EOL;

	    // OPEN GRAPH(FACEBOOK) META
	    // -------------------------
	    if ( !empty($this->pageOgTitle) ) {

	        echo "t".''.PHP_EOL;

	    }
	    if ( !empty($this->pageOgDesc) ) {

	        echo "t".''.PHP_EOL;

	    }
	    if ( !empty($this->pageOgImage) ) {

	        echo "t".''.PHP_EOL;
	        
	    }
	}

}