<?php include_once './layout/main.layout.php'; ?>
<?php include_once './components/componentGroup/navbar.component.php'; ?>
<?php include_once './components/componentGroup/footer.component.php'; ?>

<nav>
    <?php echo getNavbar('Home'); ?>
</nav>

<div class="main-content">
    <h1 class="heading">GEMSTONE</h1>
    <p class="minitext">
        Discover the captivating beauty and unique properties of various gemstones, from their geological formation
        to their cultural significance and uses in jewelry and art.
    </p>
</div>

<script src="/page/home/assets/js/home.js"></script>

<?php echo getFooter(); ?>
</body>

</html>