<nav class="navbar navbar-expand-lg navbar-dark bg-info">
<div class="container">

  <a class="navbar-brand" href="index.php">
    Contact Manager
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php setActive("contacts/index.php","active") ?> ">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item <?php setActive("contacts/create.php","active") ?>">
        <a class="nav-link" href="create.php">Add Contact</a>
      </li>
      <li class="nav-item  <?php setActive("contacts/contacts.php","active") ?>">
        <a class="nav-link" href="contacts.php">All Contacts</a>
      </li>

     
    </ul>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
    </form>

  </div>

</div>
</nav>