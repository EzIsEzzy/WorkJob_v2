{{-- Create a comment for the post --}}

<div>
    {{-- Here it is passing the (values) through the (routes) to the (function) --}}
    <form action="" method="post">
        @csrf

        <textarea name="comment" placeholder="Add a comment..."></textarea>
        <button type="submit">Post</button>

    </form>
</div>
