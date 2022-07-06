<div class="main-menu">
	<header class="header">
		<a href="{{route('admin')}}" class="logo">HPC Group</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<ul class="menu js__accordion">
				<li class="current">
					<a class="waves-effect" href="{{route('admin')}}"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Tableau de bord</span></a>
				</li>
                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-image"></i><span>Gestion de la bannière</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('banner.index')}}">bannières</a></li>
						<li><a href="{{route('banner.create')}}">Ajouter bannière</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-sitemap"></i><span>Gestion des categories</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('localisation.index')}}">Categories</a></li>
						<li><a href="{{route('localisation.create')}}">Ajouter Categorie</a></li>
                        <li><a href="{{route('gamme.index')}}">Gammes</a></li>
                        <li><a href="{{route('sous_gamme.index')}}">Sous Gammes</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi fa fa-shopping-bag"></i><span>Gestion des partenaires</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('specialite.index')}}">Partenaires</a></li>
						<li><a href="{{route('specialite.create')}}">Ajouter partenaire</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-briefcase"></i><span>Gestion des produits</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('product.index')}}">Produits</a></li>
						<li><a href="{{route('product.create')}}">Ajouter produit</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-newspaper"></i><span>Gestion des services</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('service.index')}}">Services</a></li>
						<li><a href="{{route('service.create')}}">Ajouter service</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-newspaper"></i><span>Gestion d'actualités</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('actualite.index')}}">Actualités</a></li>
						<li><a href="{{route('actualite.create')}}">Ajouter actualité</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fas fa-handshake"></i><span>Gestion d'équipe</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('equipe.index')}}">équipe</a></li>
						<li><a href="{{route('equipe.create')}}">Ajouter Membre</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fas fa-landmark"></i><span>Gestion des sociètés</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('feedback.index')}}">Nos sociètés</a></li>
						<li><a href="{{route('feedback.create')}}">Ajouter socièté</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-users"></i><span>Gestion des admins</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('user.index')}}">Tous admins</a></li>
						<li><a href="{{route('user.create')}}">Ajouter admin</a></li>
					</ul>
				</li>
                <li>
					<a class="waves-effect" href="{{route('contacts.index')}}"><i class="menu-icon fa fa-envelope"></i><span>Messages</span></a>
                </li>
                
                <li>
					<a class="waves-effect" href="{{route('newsletter.index')}}"><i class="menu-icon fas fa-clipboard-list"></i><span>NewsLetter</span></a>
                </li>
                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fas fa-history"></i><span>Historique HPC</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('history.index')}}">Toutes les années</a></li>
						<li><a href="{{route('history.create')}}">Ajouter année</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>

                <li>
					<a class="waves-effect" href="{{route('about.index')}}"><i class="menu-icon mdi mdi-settings"></i><span>à propos</span></a>
                </li>
			</ul>
		</div>
	</div>
</div>

