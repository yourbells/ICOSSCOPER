@extends('layouts.app')

@section('content')
<div class="content-regist">
    <div class="registration-fee">
        <h1>Registration Fee and Payment </h1>
    </div>
    <div class="table-wrapper">
        <table class="conference-table">
            <thead>
                <tr>
                    <th>Registration Fee</th>
                    <th>Early Bid</th>
                    <th>Reguler</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Participant</td>
                    <td>Rp. 50.000</td>
                    <td>Rp. 75.000</td>
                </tr>
                <tr>
                    <td colspan="3">Presenter</td>
                </tr>
                <tr>
                    <td><li>Undergraduate</li></td>
                    <td>Rp. 250.000</td>
                    <td>Rp. 350.000</td>
                </tr>
                <tr>
                    <td><li>Postgraduate</li></td>
                    <td>Rp. 250.000</td>
                    <td>Rp. 350.000</td>
                </tr>
                <tr>
                    <td><li>Lecturer</li></td>
                    <td>Rp. 450.000</td>
                    <td>Rp. 550.000</td>
                </tr>
                <tr>
                    <td><li>Public</li></td>
                    <td>Rp. 650.000</td>
                    <td>Rp. 800.000</td>
                </tr>
                <tr>
                    <td><li>International</li></td>
                    <td>$ 55</td>
                    <td>$ 65</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="payment">
        <h3>Payment</h3>
        <p>BNI | 7088708851 | RPL 004 BLU Unimed</p>
    </div>
    <div class="submission">
        <h1>Contact Person</h1>
        <ul>
            <li> Dr. Surya Kelana Putra, Spd.I, M.Hum., M.Ag.</li>
            <p>skputra@unimed.ac.id <br> 
                +62 813 6245 9123</p>
        </ul>
        <ul>
            <li> Muhammad Chairad, S.Pd., M.Pd</li>
            <p>chairad@unimed.ac.id <br> 
                +62 813 7522 1087</p>
        </ul>
    </div>
    {{-- <form method="POST" action="{{ route('registration') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" required autofocus>
        </div>

        <!-- Email Address -->
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required>
        </div>

        <!-- Password -->
        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <button type="submit">Register</button>
    </form> --}}
</div>
@endsection