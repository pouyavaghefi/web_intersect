<!-- Modal: Invite -->
<div class="modal fade" id="modal-invite" tabindex="-1" aria-labelledby="modal-invite" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
        <div class="modal-content">
            <div class="modal-body py-0">
                <div class="profile modal-gx-n">
                    <div class="profile-img text-primary rounded-top-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 400 140.74"></svg>
                        <div class="position-absolute top-0 start-0 p-5">
                            <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>

                    <div class="profile-body">
                        <div class="avatar avatar-lg">
                            <span class="avatar-text bg-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"></svg>
                            </span>
                        </div>
                        <h4 class="fw-bold mb-1">Invite</h4>
                        <p style="font-size: 16px;">Send invitation links</p>
                    </div>
                </div>

                <hr class="hr-bold modal-gx-n my-0">

                <div class="modal-py">
                    <form class="row gy-6">
                        <div class="col-12">
                            <label for="invite-email" class="form-label text-muted">E-mail</label>
                            <input type="email" class="form-control form-control-lg" id="invite-email" placeholder="name@example.com">
                        </div>

                        <div class="col-12">
                            <label for="invite-message" class="form-label text-muted">Message</label>
                            <textarea class="form-control form-control-lg" id="invite-message" rows="3" placeholder="Custom message"></textarea>
                        </div>
                    </form>
                </div>

                <hr class="hr-bold modal-gx-n my-0">

                <div class="modal-py">
                    <a href="#" class="btn btn-lg btn-primary w-100 d-flex align-items-center">
                        Send
                        <span class="icon ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"></svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Profile -->
<div class="modal fade" id="modal-profile" tabindex="-1" aria-labelledby="modal-profile" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
        <div class="modal-content">
            <div class="modal-body py-0">
                <div class="profile modal-gx-n">
                    <div class="profile-img text-primary rounded-top-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 400 140.74"></svg>
                        <div class="position-absolute top-0 start-0 py-6 px-5">
                            <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100" data-bs-dismiss="modal"></button>
                        </div>
                    </div>

                    <div class="profile-body">
                        <div class="avatar avatar-xl">
                            <img class="avatar-img" src="./assets/img/avatars/1.jpg" alt="">
                        </div>
                        <h4 class="mb-1"></h4>
                        <p></p>
                    </div>
                </div>

                <hr class="hr-bold modal-gx-n my-0">

                <!-- Example list template (empty values) -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>Location</h5>
                                <p></p>
                            </div>
                        </div>
                    </li>
                </ul>

                <hr class="hr-bold modal-gx-n my-0">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="#" class="text-danger">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal: User Profile -->
<div class="modal fade" id="modal-user-profile" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
        <div class="modal-content">
            <div class="modal-body py-0">
                <div class="profile modal-gx-n">
                    <div class="profile-img text-primary rounded-top-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 400 140.74"></svg>
                        <div class="position-absolute top-0 start-0 p-5">
                            <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100" data-bs-dismiss="modal"></button>
                        </div>
                    </div>

                    <div class="profile-body">
                        <div class="avatar avatar-xl">
                            <img class="avatar-img" src="" alt="">
                        </div>
                        <h4 class="mb-1"></h4>
                        <p></p>
                    </div>
                </div>

                <hr class="hr-bold modal-gx-n my-0">

                <!-- Example user info list -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>E-mail</h5>
                                <p></p>
                            </div>
                        </div>
                    </li>
                </ul>

                <hr class="hr-bold modal-gx-n my-0">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="#" class="text-reset">Send Message</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="text-danger">Block User</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
