@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <div class="p-4" style="background-color: #f9f9f9; border-radius: 10px;">
                <h2 class="fw-bold mb-3">Contact Us</h2>
                <p>We are bridging the gap between service providers and end users</p>
                <div class="mb-3">
                    <span class="fab fa-whatsapp fa-lg"></span>
                    <span class="ms-2">Chat with our Admin</span>
                    <p class="ms-4">081245236928 (Whatsapp)</p>
                </div>
                <form method="post" id="formContact">
                    <div class="form-check custom-checkbox mb-3">
                        <input class="form-check-input mb-2" name="receiveEmail" type="checkbox" id="sendEmailCheckbox" checked>
                        <label class="form-check-label" for="sendEmailCheckbox">
                            Send us an email
                        </label>
                        <p class="ms-1">Our friendly team is here to help you. Send a mail to <a class="text-decoration-none" href="mailto:kampungwarna-warni@gmail.com">a.kampungwarna-warni@gmail.com</a></p>
                    </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="fw-bold mb-3">Fill the customer support form</h2>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nama">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Messages</label>
                <textarea class="form-control" name="message" id="message" rows="4" placeholder="Type your messages"></textarea>
            </div>
            <div class="d-grid">
                <button type="submit" id="btnSubmit" class="btn text-white" style="background-color: #F79009;">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection