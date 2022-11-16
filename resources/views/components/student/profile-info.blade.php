<div class="row">
    <div class="col-lg-6">
        <div class="about-student">
            <h6 class="font-title--card">About Me</h6>
            <p class="font-para--md">
                {{ $student->about }}
            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="info-student">
            <h6 class="font-title--card">{{ $student->firstname }} Information</h6>
            <dl class="row my-0 info-student-topic">
                <dt class="col-sm-4">
                    <span>Name</span>
                </dt>
                <dd class="col-sm-8">
                    <p>{{ $student->firstname . ' ' . $student->lastname }}</p>
                </dd>
            </dl>
            <dl class="row my-0 info-student-topic">
                <dt class="col-sm-4">
                    <span>E-mail</span>
                </dt>
                <dd class="col-sm-8">
                    <p>{{ $student->email }}</p>
                </dd>
            </dl>
            <dl class="row my-0 info-student-topic">
                <dt class="col-sm-4">
                    <span>What do you do</span>
                </dt>
                <dd class="col-sm-8">
                    <p>{{ $student->profession }}</p>
                </dd>
            </dl>
            <dl class="row my-0 info-student-topic">
                <dt class="col-sm-4">
                    <span>Phone Number</span>
                </dt>
                <dd class="col-sm-8">
                    <p>{{ $student->phone }}</p>
                </dd>
            </dl>
            <dl class="row my-0 info-student-topic">
                <dt class="col-sm-4">
                    <span>Nationality</span>
                </dt>
                <dd class="col-sm-8">
                    <p>{{ $student->nationality }}</p>
                </dd>
            </dl>
        </div>
    </div>
</div>
