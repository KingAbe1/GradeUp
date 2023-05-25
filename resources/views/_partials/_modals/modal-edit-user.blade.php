<!-- Edit User Modal -->
@if (Auth::user()->role_id == 1)
    <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Edit User Information</h3>
                        <p class="text-muted">Updating user details will receive a privacy audit.</p>
                    </div>
                    <form id="editUserForm" method="POST" action="/app/user/view/account/{{ Auth::user()->id }}"
                        class="row g-3" onsubmit="return false">
                        @csrf
                        @method('PUT')
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserFirstName">First Name</label>
                            <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName"
                                class="form-control" value="{{ Auth::user()->first_name }}" placeholder="Abel" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserLastName">Last Name</label>
                            <input type="text" id="modalEditUserLastName" name="modalEditUserLastName"
                                class="form-control" value="{{ Auth::user()->last_name }}" placeholder="Legesse" />
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="modalEditUserName">Username</label>
                            <input type="text" id="modalEditUserName" name="modalEditUserName" class="form-control"
                                value="{{ Auth::user()->user_name }}" placeholder="@bel!egesse" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Email</label>
                            <input type="text" id="modalEditUserEmail" name="modalEditUserEmail" class="form-control"
                                value="{{ Auth::user()->email }}" placeholder="abel@gmail.com" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserPhone">Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text">ET (+251)</span>
                                <input type="text" id="modalEditUserPhone" name="modalEditUserPhone"
                                    class="form-control" value="{{ Auth::user()->phone_number }}"
                                    placeholder="956231170" />
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <br><br>
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@elseif(Auth::user()->role_id == 2)
    <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Edit User Information</h3>
                        <p class="text-muted">Updating user details will receive a privacy audit.</p>
                    </div>
                    <form id="editUserForm" method="POST" action="/app/user/view/account/{{ Auth::user()->id }}"
                        class="row g-3" onsubmit="return false">
                        @csrf
                        @method('PUT')
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserFirstName">First Name</label>
                            <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName"
                                class="form-control" value="{{ Auth::user()->first_name }}" placeholder="Abel" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserLastName">Last Name</label>
                            <input type="text" id="modalEditUserLastName" name="modalEditUserLastName"
                                class="form-control" value="{{ Auth::user()->last_name }}" placeholder="Legesse" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserName">Username</label>
                            <input type="text" id="modalEditUserName" name="modalEditUserName"
                                class="form-control" value="{{ Auth::user()->user_name }}"
                                placeholder="@bel!egesse" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="multiStepsSchool">School</label>
                            <input type="text" id="multiStepsSchool" name="multiStepsSchool" class="form-control"
                                value="{{ Auth::user()->school_name }}" placeholder="Enter your school name" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Email</label>
                            <input type="text" id="modalEditUserEmail" name="modalEditUserEmail"
                                class="form-control" value="{{ Auth::user()->email }}"
                                placeholder="abel@gmail.com" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserPhone">Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text">ET (+251)</span>
                                <input type="text" id="modalEditUserPhone" name="modalEditUserPhone"
                                    class="form-control" value="{{ Auth::user()->phone_number }}"
                                    placeholder="956231170" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="grade">What grade are you in?</label>
                            <select name="grade" id="grade" class="select2 form-select"
                                data-allow-clear="true">
                                @if (Auth::user()->grade == '9')
                                    <option selected value="9">Grade 9</option>
                                @else
                                    <option value="9">Grade 9</option>
                                @endif
                                @if (Auth::user()->grade == '10')
                                    <option selected value="10">Grade 10</option>
                                @else
                                    <option value="10">Grade 10</option>
                                @endif
                                @if (Auth::user()->grade == '11')
                                    <option selected value="11">Grade 11</option>
                                @else
                                    <option value="11">Grade 11</option>
                                @endif
                                @if (Auth::user()->grade == '12')
                                    <option selected value="12">Grade 12</option>
                                @else
                                    <option value="12">Grade 12</option>
                                @endif

                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="multiStepsCity">Region</label>
                            <select id="multiStepsCity" name="multiStepsCity" class="select2 form-control">
                                @if (Auth::user()->region == 'Addis Ababa')
                                    <option selected value="Addis Ababa">Addis Ababa Region</option>
                                @else
                                    <option value="Addis Ababa">Addis Ababa Region</option>
                                @endif
                                @if (Auth::user()->region == 'Tigray')
                                    <option selected value="Tigray">Tigray Region</option>
                                @else
                                    <option value="Tigray">Tigray Region</option>
                                @endif
                                @if (Auth::user()->region == 'Amhara')
                                    <option selected value="Amhara">Amhara Region</option>
                                @else
                                    <option value="Amhara">Amhara Region</option>
                                @endif
                                @if (Auth::user()->region == 'Somali')
                                    <option selected value="Somali">Somali Region</option>
                                @else
                                    <option value="Somali">Somali Region</option>
                                @endif
                                @if (Auth::user()->region == 'Afar')
                                    <option selected value="Afar">Afar Region</option>
                                @else
                                    <option value="Afar">Afar Region</option>
                                @endif
                                @if (Auth::user()->region == 'Oromia')
                                    <option selected value="Oromia">Oromia Region</option>
                                @else
                                    <option value="Oromia">Oromia Region</option>
                                @endif
                                @if (Auth::user()->region == 'Sidama')
                                    <option selected value="Sidama">Sidama Region</option>
                                @else
                                    <option value="Sidama">Sidama Region</option>
                                @endif
                                @if (Auth::user()->region == 'Benishangul-Gumuz')
                                    <option selected value="Benishangul-Gumuz">Benishangul-Gumuz Region</option>
                                @else
                                    <option value="Benishangul-Gumuz">Benishangul-Gumuz Region</option>
                                @endif
                                @if (Auth::user()->region == 'Harari')
                                    <option selected value="Harari">Harari Region</option>
                                @else
                                    <option value="Harari">Harari Region</option>
                                @endif
                                @if (Auth::user()->region == 'Gambela')
                                    <option selected value="Gambela">Gambela Region</option>
                                @else
                                    <option value="Gambela">Gambela Region</option>
                                @endif
                                @if (Auth::user()->region == 'Dire Dawa')
                                    <option selected value="Dire Dawa">Dire Dawa Region</option>
                                @else
                                    <option value="Dire Dawa">Dire Dawa Region</option>
                                @endif
                                @if (Auth::user()->region == 'South West Ethiopia Peoples')
                                    <option selected value="South West Ethiopia Peoples">South West Ethiopia Peoples'
                                        Region</option>
                                @else
                                    <option value="South West Ethiopia Peoples">South West Ethiopia Peoples'
                                        Region</option>
                                @endif

                            </select>
                        </div>
                        <div class="col-12 text-center">
                            <br><br>
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
<!--/ Edit User Modal -->
