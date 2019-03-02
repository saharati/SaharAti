<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
function printHeader($page)
{
    echo '<header>
<h1>
<a href="/" title="Sahar Atias">
<img src="/images/title.jpg" title="Sahar Atias" alt="Sahar Atias">
</a>
</h1>
<nav>
<div>
<a ' . ($page == 2 ? 'class="active" ' : '') . 'href="/java" title="Java for beginners">
<i class="fas fa-code"></i>
<strong>Java</strong>
<small>For beginners</small>
</a>
</div>
<div>
<a ' . ($page == 3 ? 'class="active" ' : '') . 'href="/logic" title="Our logic article">
<i class="fas fa-random"></i>
<strong>Logic</strong>
<small>Our article</small>
</a>
</div>
<div>
<a ' . ($page == 1 ? 'class="active" ' : '') . 'href="/" title="My projects">
<i class="fas fa-book"></i>
<strong>Projects</strong>
<small>Sahar in action</small>
</a>
</div>
<div>
<a ' . ($page == 4 ? 'class="active" ' : '') . 'href="/cv" title="My CV">
<i class="fas fa-id-card"></i>
<strong>CV</strong>
<small>About me</small>
</a>
</div>
<div>
<a ' . ($page == 5 ? 'class="active" ' : '') . 'href="/contact" title="Contact me">
<i class="fas fa-envelope"></i>
<strong>Contact</strong>
<small>Keep in touch</small>
</a>
</div>
</nav>
</header>';
}
?>