<div class="menu">
    <div class="menu-item menu-item-dropdown">
        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
            <i class="ki-filled ki-dots-vertical"></i>
        </button>
        <div class="menu-dropdown menu-default w-full max-w-[175px] show">
            @isset ( $viewLink )
                <div class="menu-item">
                    <a href="{{ $viewLink }}">
                        <span class="menu-icon">
                            <i class="ki-filled ki-search-list"></i>
                        </span>
                        <span class="menu-title">View</span>
                    </a>
                </div>
            @endif

            <div class="menu-separator"></div>

            @isset ( $editLink )
                <div class="menu-item">
                    <a href="{{ $editLink }}">
                        <span class="menu-icon">
                            <i class="ki-filled ki-pencil"></i>
                        </span>
                        <span class="menu-title">Edit</span>
                    </a>
                </div>
            @endif

            @isset ( $deleteLink )
                <div class="menu-item">
                    <form
                        action="{{ $deleteLink }}"
                        class="d-inline"
                        method="POST"
                        x-data
                        @submit.prevent="if (confirm('Are you sure you want to delete this user?')) $el.submit()"
                    >
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-link">
                            <i class="fa-solid fa-trash"></i>
                            Remove
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
