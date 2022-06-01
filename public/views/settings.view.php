<?php 
    use App\modules\AppPacker\AppPacker;
?>
<header class="colored"></header>
<nav class="d-flex flex-column justify-content-between align-items-center light">
    <section class="navbar-brand d-flex align-items-center">
        <img src="../static/assets/icons/icon.64.png" alt="web site icon">
        <p> Merix </p>
    </section>
    <input type="hidden" id="nav-knowledge" value="settings">
    <?php 
        AppPacker::render( 'components/account.menu' );
    ?>
</nav>