<select onchange="$('#course_filtering').submit()" name="sorting">
    <option {{ $sorting == 'default' ? 'selected' : '' }} value="default">Default</option>
    <option {{ $sorting == 'trending' ? 'selected' : '' }} value="trending">Trending</option>
    <option {{ $sorting == 'purchased' ? 'selected' : '' }} value="purchased">Most Purchased</option>
    <option {{ $sorting == 'latest' ? 'selected' : '' }} value="latest">Latest</option>
    <option {{ $sorting == 'free' ? 'selected' : '' }} value="free">Free Course</option>
    <option {{ $sorting == 'low_to_high' ? 'selected' : '' }} value="low_to_high">Price (Low > High)</option>
    <option {{ $sorting == 'high_to_low' ? 'selected' : '' }} value="high_to_low">Price (High > Low)</option>
</select>
