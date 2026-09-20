<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Online Payment
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background: #f4f7fb;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: #ffffff;
            border-bottom: 1px solid #e8edf3;
        }

        .brand {
            font-size: 21px;
            font-weight: 700;
            color: #0d6efd;
        }

        .payment-card {
            background: #ffffff;
            border: 0;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(0,0,0,.06);
        }

        .payment-title {
            font-size: 27px;
            font-weight: 700;
            color: #1f2937;
        }

        .payment-subtitle {
            color: #6b7280;
        }

        .demo-box {
            background: #fff8e1;
            border: 1px solid #ffe082;
            border-radius: 12px;
            padding: 15px;
        }

        .demo-card-number {
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .form-control {
            padding: 12px;
            border-radius: 10px;
        }

        .pay-btn {
            width: 100%;
            padding: 13px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 16px;
        }

        .amount {
            font-size: 28px;
            font-weight: 700;
            color: #0d6efd;
        }

    </style>

</head>


<body>


<nav class="navbar">

    <div class="container">

        <div class="d-flex
                    justify-content-between
                    align-items-center
                    w-100">

            <div class="brand">
                Patient Portal
            </div>

            <a
                href="{{ route(
                    'patient.appointment.show',
                    $appointment->id
                ) }}"
                class="btn btn-outline-secondary btn-sm"
            >
                Back
            </a>

        </div>

    </div>

</nav>



<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-6">


            <div class="mb-4 text-center">

                <div class="payment-title">
                    Online Payment
                </div>

                <div class="payment-subtitle mt-1">
                    Complete your payment securely.
                </div>

            </div>



            @if(session('error'))

                <div class="alert alert-danger">

                    {{ session('error') }}

                </div>

            @endif



            <div class="card payment-card">

                <div class="card-body p-4">


                    <div class="text-center mb-4">

                        <div class="text-muted">
                            Total Payable
                        </div>

                        <div class="amount">

                            ৳ {{ number_format(
                                $appointment->payment->amount,
                                2
                            ) }}

                        </div>

                    </div>



                    {{-- Demo Card Information --}}

                    <div class="demo-box mb-4">

                        <div class="fw-bold mb-1">
                            Demo Payment
                        </div>

                        <div class="small text-muted mb-2">
                            Use this test card:
                        </div>

                        <div class="demo-card-number">
                            4242 4242 4242 4242
                        </div>

                        <div class="small text-muted mt-2">
                            Any future expiry date and any 3-digit CVV.
                        </div>

                    </div>



                    <form
                        action="{{ route(
                            'patient.appointment.fake.payment.process',
                            $appointment->id
                        ) }}"
                        method="POST"
                    >

                        @csrf


                        <div class="mb-3">

                            <label class="form-label">
                                Card Number
                            </label>

                            <input
                                type="text"
                                name="card_number"
                                class="form-control"
                                value="{{ old('card_number') }}"
                                placeholder="4242 4242 4242 4242"
                                maxlength="16"
                                required
                            >

                            @error('card_number')

                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>

                            @enderror

                        </div>



                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Expiry
                                </label>

                                <input
                                    type="text"
                                    name="expiry"
                                    class="form-control"
                                    value="{{ old('expiry') }}"
                                    placeholder="12/30"
                                    maxlength="5"
                                    required
                                >

                                @error('expiry')

                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>

                                @enderror

                            </div>



                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    CVV
                                </label>

                                <input
                                    type="password"
                                    name="cvv"
                                    class="form-control"
                                    placeholder="123"
                                    maxlength="3"
                                    required
                                >

                                @error('cvv')

                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>

                                @enderror

                            </div>

                        </div>



                        <button
                            type="submit"
                            class="btn btn-primary pay-btn mt-2"
                        >
                            Pay ৳ {{ number_format(
                                $appointment->payment->amount,
                                2
                            ) }}
                        </button>


                    </form>


                </div>

            </div>

        </div>

    </div>

</div>


</body>

</html>
