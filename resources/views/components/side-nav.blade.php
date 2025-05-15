<div class="side-nav p-3">
    <a href="{{ $isAdmin ? route('admin.dashboard') : route('user.dashboard') }}" 
        class="{{ request()->routeIs($isAdmin ? 'admin.dashboard' : 'user.dashboard') ? 'active' : '' }}">
        <i class="fas fa-home"></i><span> Dashboard</span>
    </a>    
    @if($isAdmin)
        {{-- Admin Links --}}
        <a href="{{ route('admin.manageUsers') }}" class="{{ request()->routeIs('admin.manageUsers') ? 'active' : '' }}">
            <i class="fas fa-users"></i><span>  Manage Users</span>
        </a>
        {{-- This Manage Users is a page where admin can view a list of all registered users(!is_admin) 
        from database (users table) in a table format. Admin can view, edit, and ban users.  --}}
        <a href="{{ route('admin.manageListings') }}" class="{{ request()->routeIs('admin.manageListings') ? 'active' : '' }}">
            <i class="fas fa-file-alt"></i><span>  Manage Car Listings</span>
        </a>
         {{-- This Manage Car Listing is a page where admin can view a list of all created and stored car posts 
        from database (car_posts table) in a grid format. Admin can view, edit, and deactivate car posts 
        to remove from public car listing page --}}
    @else
        {{-- User Links --}}
        <a href="{{ route('user.create') }}" class="{{ request()->routeIs('user.create') ? 'active' : '' }}">
            <i class="fas fa-car"></i><span>  Sell Car</span>
        </a>
        {{-- This Sell Car is a page where users can create a new car post, store to database,
        and publish to public car listing page. --}}
        <a href="{{ route('user.yourListings') }}" class="{{ request()->routeIs('user.yourListings') ? 'active' : '' }}">
            <i  class="fas fa-list"></i><span>  Your Car Listings</span>
        </a>
        {{-- This Your Car Listings is a page where users can view his published car posts
        and also edit, and deactivate the car posts which are sold out to remove from public car listing page.  --}}
        <a href="{{ route('user.yourBids') }}" class="{{ request()->routeIs('user.yourBids') ? 'active' : '' }}">
            <i class="fas fa-history" ></i><span>  Your Bids</span>
        </a>
        {{-- This Your Bids page is where users can view other's bids along with the bidder's name on his published car posts.
        Moreover, users can accept the other's bid or reject the bid. 
        If user accept the bid, that car will be regarded as sold out--}}
        <a href="{{ route('user.yourAppointments') }}" class="{{ request()->routeIs('user.yourAppointments') ? 'active' : '' }}">
            <i class="fas fa-calendar-alt"></i><span>  Your Appointments</span>
        </a>
        {{-- This Your Appointments page is where users can view other's appointments along with date and time for test drive for user's car.
        Moreover, users can accept the appointment or reject the appointment. --}}
    @endif
</div>
