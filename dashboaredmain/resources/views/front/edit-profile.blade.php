
<div id="profile-edit" style="display: none;">
    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')        
    <div class="row">
        <div class="col-12 text-center m-b-30">
            <div class="hov-img0 pos-relative">
                <img src="/api/placeholder/120/120" alt="Profile" class="rounded-circle">
                <div class="trans-04 ab-t-l flex-c-m full-size-btn bg1 fs-18">
                    <i class="zmdi zmdi-camera"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-6 p-b-20">
            <div class="bor8 how-pos4-parent">
                <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="text" value="John Doe" placeholder="Full Name">
            </div>
        </div>

        <div class="col-sm-6 p-b-20">
            <div class="bor8 how-pos4-parent">
                <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="email" value="john@example.com" placeholder="Email">
            </div>
        </div>

        <div class="col-sm-6 p-b-20">
            <div class="bor8 how-pos4-parent">
                <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="tel" value="+1 234 567 8900" placeholder="Phone Number">
            </div>
        </div>

        <div class="col-sm-6 p-b-20">
            <div class="bor8 how-pos4-parent">
                <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="password" value="********" placeholder="Password">
            </div>
        </div>

        <div class="col-12 p-b-20">
            <div class="bor8 how-pos4-parent">
                <textarea class="stext-111 cl2 plh3 size-120 p-lr-20 p-tb-25" placeholder="Address">123 Street Name, City, Country</textarea>
            </div>
        </div>

        <div class="col-sm-6 p-b-20">
            <div class="bor8 how-pos4-parent">
                <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="text" value="New York" placeholder="City">
            </div>
        </div>

        <div class="col-12">
            <button onclick="saveChanges()" class="flex-c-m stext-101 cl0 size-112 bg1 bor1 hov-btn1 p-lr-15 trans-04 m-b-10">
                Save Changes
            </button>
            <button onclick="toggleEditMode()" class="flex-c-m stext-101 cl0 size-112 bg3 bor1 hov-btn3 p-lr-15 trans-04 m-b-10">
                Cancel
            </button>
        </div>
    </div>
</form>
</div>
