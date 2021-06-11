<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($page as $p)
        <url>
            <loc>{{$url}}/page/{{ $p->slug }}</loc>
            <lastmod>{{ $p->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
    @foreach ($post as $p)
        <url>
            <loc>{{$url}}/post/{{ $p->slug }}</loc>
            <lastmod>{{ $p->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>
<?php
