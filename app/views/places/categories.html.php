<?php use \app\models\CategoryList; ?>

<?php //<li><input placeholder="Filter results..." data-type="search" class="ui-input-text ui-body-c"></li> ?>

<ul data-role="listview" data-inset="true" data-theme="<?php echo THEME_LIST; ?>" data-dividertheme="<?php echo THEME_MAIN; ?>">
	<li data-role="list-divider"><?php echo $title; ?></li>
<?php if ($categories instanceof CategoryList && $categories->getNumFound() > 0) { ?>

		<?php if (!empty($all)) { ?>
			<li data-iconpos="left" data-icon="minus"><?php echo $this->html->link("Principais categorias", "/places/categories"); ?></li>
		<?php } else { ?>
			<li data-iconpos="left" data-icon="plus"><?php echo $this->html->link("Todas as categorias", "/places/categories/all"); ?></li>
		<?php } ?>
		
		<?php foreach ($categories->getItems() as $category) { ?>
            <li><?php echo $this->html->link($category->getName(), "/places/category/0" . $category->getId()); ?></li>
        <?php } ?>
	
<?php } else { ?>
    <li>Nenhuma categoria encontrada.</li>
<?php } ?>
</ul>
