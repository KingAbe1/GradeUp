@if (Auth::user()->role_id == 2)
    <!-- Add New Credit Card Modal -->
    <div class="modal fade" id="upgradePlanModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-simple modal-upgrade-plan">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Upgrade Plan</h3>
                        <p>Choose the best plan for you.</p>
                    </div>
                    <form id="upgradePlanForm" class="row g-3" onsubmit="return false">
                        <div class="col-sm-8">
                            <label class="form-label" for="choosePlan">Choose Plan</label>
                            <select id="choosePlan" name="choosePlan" class="form-select" aria-label="Choose Plan">
                                <option selected>Choose Plan</option>
                                @foreach ($plans as $plan)
                                    <option value="{{ $plan->id }}">{{ $plan->name }} - ETB
                                        {{ $plan->price }}/month
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary">Upgrade</button>
                        </div>
                    </form>
                </div>
                <hr class="mx-md-n5 mx-n3">
                <div class="modal-body">
                    <p class="mb-0">User current plan is {{ $current_plans[0]['name'] }}</p>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex justify-content-center me-2">
                            <sup class="h6 pricing-currency pt-1 mt-3 mb-0 me-1 text-primary">ETB</sup>
                            <h1 class="display-5 mb-0 text-primary">{{ $current_plans[0]['price'] }}</h1>
                            <sub class="h5 pricing-duration mt-auto mb-2 text-muted">/month</sub>
                        </div>
                        <button class="btn btn-label-danger cancel-subscription mt-3">Cancel Subscription</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Add New Credit Card Modal -->
@endif
