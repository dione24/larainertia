<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="index3.html" class="brand-link">
            <img src="~admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="~admin-lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <Link :href="route('home')" class="nav-link" :class="{ 'active': $page.component == 'Home' }">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Accueil
                        </p>
                        </Link>
                    </li>


                    <li class="nav-item" :class="{ 'menu-open': $page.component.startsWith('Etudiant') }">
                        <Link href="#" class="nav-link" :class="{ 'active': $page.component.startsWith('Etudiant') }">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Gestion des Etudiants
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </Link>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <Link :href="route('etudiant.index')" class="nav-link"
                                    :class="{ 'active': $page.component == 'EtudiantIndex' }">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Liste des Etudiants</p>
                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link :href="route('etudiant.create')" class="nav-link"
                                    :class="{ 'active': $page.component == 'EtudiantCreate' }">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nouveau</p>
                                </Link>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <Link :href="route('niveauscolaire.index')" class="nav-link"
                            :class="{ 'active': $page.component == 'IndexNiveauScolaire' }">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Niveau Scolaire
                        </p>
                        </Link>
                    </li>


                </ul>
            </nav>

        </div>

    </aside>
</template>


