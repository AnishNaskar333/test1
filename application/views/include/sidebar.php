<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
					<img src="<?= base_url('assets/img/logo.png'); ?>" alt="" width="200px">
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="<?= base_url('dashboard'); ?>">
							<i class="align-middle" data-feather="list"></i> <span
								class="align-middle">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-item ">
						<a class="sidebar-link" href="<?= base_url('checksheet-list')?>">
							<i class="align-middle" data-feather="list"></i> <span
								class="align-middle">Checksheet Lists</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= base_url('create-checksheet')?>">
							<i class="align-middle" data-feather="plus"></i> <span class="align-middle">Create New checksheet</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>