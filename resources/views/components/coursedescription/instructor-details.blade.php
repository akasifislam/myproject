                            <!-- course details instructor  -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="course-instructor mw-100">
                                        <div class="course-instructor-info">
                                            <div class="instructor-image">
                                                <img src="{{ asset($course->instructor->image) }}" alt="Instructor" />
                                            </div>
                                            <div class="instructor-text">
                                                <h6 class="font-title--xs">
                                                    <a
                                                        href="{{ route('instructor.profile', $course->instructor->slug) }}">{{ $course->instructor->firstname . ' ' . $course->instructor->lastname }}</a>
                                                </h6>
                                                <p>{{ $course->instructor->profession }}</p>
                                                <div class="d-flex align-items-center instructor-text-bottom">
                                                    <div class="d-flex align-items-center ratings-icon">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9.94438 2.34287L11.7457 5.96656C11.8359 6.14934 12.0102 6.2769 12.2124 6.30645L16.2452 6.88901C16.4085 6.91079 16.5555 6.99635 16.6559 7.12701C16.8441 7.37201 16.8153 7.71891 16.5898 7.92969L13.6668 10.7561C13.5183 10.8961 13.4522 11.1015 13.4911 11.3014L14.1911 15.2898C14.2401 15.6204 14.0145 15.93 13.684 15.9836C13.5471 16.0046 13.4071 15.9829 13.2826 15.9214L9.69082 14.0384C9.51037 13.9404 9.29415 13.9404 9.1137 14.0384L5.49546 15.9315C5.1929 16.0855 4.82267 15.9712 4.65778 15.6748C4.59478 15.5551 4.57301 15.419 4.59478 15.286L5.29479 11.2975C5.32979 11.0984 5.26368 10.8938 5.11901 10.753L2.18055 7.92735C1.94099 7.68935 1.93943 7.30201 2.17821 7.06246C2.17899 7.06168 2.17977 7.06012 2.18055 7.05935C2.27932 6.9699 2.40066 6.91001 2.5321 6.88668L6.56569 6.30412C6.76713 6.27223 6.94058 6.14623 7.03236 5.96345L8.83215 2.34287C8.90448 2.19587 9.03281 2.08309 9.18837 2.03176C9.3447 1.97965 9.51582 1.99209 9.66282 2.06598C9.78337 2.12587 9.88215 2.22309 9.94438 2.34287Z"
                                                                stroke="#FF7A1A" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                            </path>
                                                        </svg>
                                                        <p>{{ $avgStar }}
                                                            Star Rating</p>
                                                    </div>
                                                    <div class="d-flex align-items-center ratings-icon">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M1.5 2.25H6C6.79565 2.25 7.55871 2.56607 8.12132 3.12868C8.68393 3.69129 9 4.45435 9 5.25V15.75C9 15.1533 8.76295 14.581 8.34099 14.159C7.91903 13.7371 7.34674 13.5 6.75 13.5H1.5V2.25Z"
                                                                stroke="#00AF91" stroke-width="1.8"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                            <path
                                                                d="M16.5 2.25H12C11.2044 2.25 10.4413 2.56607 9.87868 3.12868C9.31607 3.69129 9 4.45435 9 5.25V15.75C9 15.1533 9.23705 14.581 9.65901 14.159C10.081 13.7371 10.6533 13.5 11.25 13.5H16.5V2.25Z"
                                                                stroke="#00AF91" stroke-width="1.8"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                        </svg>

                                                        <p>{{ $totalcourses }} Courses</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="lead-p"></p>
                                        <p class="course-instructor-description">
                                            {!! $course->instructor->about !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
