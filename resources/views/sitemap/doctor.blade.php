<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{$url}}/doctor</loc>
        <lastmod>2021-05-20T11:33:14+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    @foreach ($doctor as $p)
        <url>
            <loc>{{$url}}/doctor/{{ $p->slug }}</loc>
            <lastmod>{{ $p->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>
<?php
