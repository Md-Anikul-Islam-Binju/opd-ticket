<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Manual Payment
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

        .message-card {
            background: #ffffff;
            border: 0;
            border-radius: 20px;
            box-shadow: 0 10px 35px rgba(0,0,0,.07);
        }

        .success-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: #d1e7dd;
            color: #198754;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin: 0 auto 20px;
        }

        .title {
            font-size: 27px;
            font-weight: 700;
            color: #1f2937;
        }

        .message {
            color: #6b7280;
            line-height: 1.7;
        }

        .ticket-box {
            background: #eef6ff;
            border: 1px solid #cfe2ff;
            border-radius: 14px;
            padding: 18px;
        }

        .ticket-label {
            font-size: 12px;
            color: #6b7280;
        }

        .ticket-number {
            color: #0d6efd;
            font-size: 22px;
            font-weight: 700;
            margin-top: 4px;
        }

        .amount {
            font-size: 24px;
            font-weight: 700;
        }

        .notice {
            background: #fff8e1;
            border: 1px solid #ffe082;
            border-radius: 12px;
            padding: 16px;
            color: #665b2d;
        }

        .btn-custom {
            border-radius: 10px;
            padding: 11px 22px;
            font-weight: 600;
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
                href="{{ route('patient.dashboard') }}"
                class="btn btn-outline-secondary btn-sm"
            >
                Dashboard
            </a>

        </div>

    </div>

</nav>



<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">


            <div class="card message-card">

                <div class="card-body p-5 text-center">


                    <div class="success-icon">
                        ✓
                    </div>


                    <div class="title mb-3">
                        Manual Payment Selected
                    </div>


                    <p class="message mb-4">

                        Your appointment has been successfully
                        reserved.

                        Please visit the hospital and complete
                        your payment at the designated payment
                        counter.

                    </p>



                    {{-- Ticket --}}

                    <div class="ticket-box mb-4">

                        <div class="ticket-label">
                            Appointment Ticket
                        </div>

                        <div class="ticket-number">

                            {{ $appointment->ticket_number }}

                        </div>

                    </div>



                    <div class="row g-3 mb-4">


                        <div class="col-md-6">

                            <div class="border rounded p-3">

                                <div class="text-muted small">
                                    Doctor
                                </div>

                                <div class="fw-bold">

                                    Dr.
                                    {{ $appointment->doctor->name }}

                                </div>

                            </div>

                        </div>



                        <div class="col-md-6">

                            <div class="border rounded p-3">

                                <div class="text-muted small">
                                    Ticket Fee
                                </div>

                                <div class="amount">

                                    ৳ {{ number_format(
                                        $appointment->payment->amount,
                                        2
                                    ) }}

                                </div>

                            </div>

                        </div>

                    </div>



                    {{-- Important Message --}}

                    <div class="notice text-start mb-4">

                        <strong>
                            Important:
                        </strong>

                        <div class="mt-2">

                            Hospital-এ গিয়ে payment করার পর
                            আপনার appointment ticket-এ
                            payment-এর একটি official
                            <strong>seal</strong> দেওয়া হবে।

                        </div>

                        <div class="mt-2">

                            Hospital থেকে payment confirmation
                            না পাওয়া পর্যন্ত আপনার payment
                            status <strong>Pending</strong> থাকবে।

                        </div>

                    </div>



                    <div class="d-flex
                                justify-content-center
                                gap-2
                                flex-wrap">

                        <a
                            href="{{ route(
                                'patient.appointment.show',
                                $appointment->id
                            ) }}"
                            class="btn btn-primary btn-custom"
                        >
                            View Appointment
                        </a>


                        <a
                            href="{{ route(
                                'patient.dashboard'
                            ) }}"
                            class="btn btn-outline-secondary btn-custom"
                        >
                            Dashboard
                        </a>

                    </div>


                </div>

            </div>

        </div>

    </div>

</div>


</body>

</html>
