<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card flex-fill">
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success text-success">
                            <?= $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif;
                    if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger text-danger">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-header">

                        <h5 class="card-title mb-0">CheckSheet Lists</h5>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>Created date</th>
                                <th class="d-none d-xl-table-cell">Checksheet Name</th>
                                <th class="d-none d-xl-table-cell">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01/01/2021</td>
                                <td class="d-none d-xl-table-cell">Project Apollo</td>
                                <td class="d-none d-xl-table-cell">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        class="btn btn-success btn-sm me-1"><i
                                            class="fa-solid fa-eye"></i></a>
                                    <a href="#" class="btn btn-primary btn-sm"><i
                                            class="fa-solid fa-pencil"></i></a>
                                    <a href="#" class="btn btn-secondary btn-sm"><i
                                            class="fa-solid fa-file-arrow-down"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm"><i
                                            class="fa-regular fa-file-pdf"></i></a>

                                </td>
                            </tr>
                            <tr>
                                <td>31/06/2021</td>
                                <td class="d-none d-xl-table-cell">Project Fireball</td>
                                <td class="d-none d-xl-table-cell">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        class="btn btn-success btn-sm me-1"><i
                                            class="fa-solid fa-eye"></i></a>
                                    <a href="#" class="btn btn-primary btn-sm"><i
                                            class="fa-solid fa-pencil"></i></a>
                                    <a href="#" class="btn btn-secondary btn-sm"><i
                                            class="fa-solid fa-file-arrow-down"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm"><i
                                            class="fa-regular fa-file-pdf"></i></a>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Pdf view modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <img class="w-100" src="img/pdf.png" alt="">
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            </div>
        </div>
    </div>
</div>