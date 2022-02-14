<!--pager-->
<!--?php if ( function_exists( 'fit_pagination' ) ) {fit_pagination( $wp_query->max_num_pages );} ?-->
<!--/pager-->

<!---------------------------------------------pager追加場所--------------------------------------------->
<div id="pageNavi">
<?php $url = $_SERVER['REQUEST_URI']; ?><!--カレントurlの取得-->
<?php if(strstr($url,'articles')): ?>

<?php 
$paged = (int) get_query_var('paged');
$query_varA = get_the_category();
$category = $query_varA[0];

$args = array(
'cat'=> $category->cat_ID,
'posts_per_page' => 10,//ページ/表示する投稿数
'paged' => $paged,
'orderby' => 'post_date',
'order' => 'DESC',
'post_type' => 'post',
'post_status' => 'publish'
);

$categoryName = $query_varA[0]->slug;
$the_query = new WP_Query($args);
if ($the_query->max_num_pages > 1) {
    echo paginate_links(array(
    'base' => home_url().'/'.$categoryName . '%_%',//ここuriを本番環境ドメイン名と一致させる。
    'format' => '?paged=%#%',
    'current' => max(1, $paged),
    'total' => $the_query->max_num_pages
    ));
}
?>

<?php wp_reset_postdata(); ?>


<?php else: ?>

<?php
$paged = (int) get_query_var('paged');
$query_varA = get_the_category();
$category = $query_varA[0];
$args = array(
'cat'=> $category->cat_ID,
'posts_per_page' => 10,
'paged' => $paged,
'orderby' => 'post_date',
'order' => 'DESC',
'post_type' => 'post',
'post_status' => 'publish'
);

$categoryName = $query_varA[0]->slug;
$the_query = new WP_Query($args);

if ($the_query->max_num_pages > 1) {
echo paginate_links(array(
'base' => home_url().'/'.$categoryName . '%_%',
'format' => '?paged=%#%',
'current' => max(1, $paged),
'total' => $the_query->max_num_pages
));
}
?>

<?php wp_reset_postdata(); ?>

<?php endif; ?>
</div>