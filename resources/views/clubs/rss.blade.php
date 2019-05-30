{!! '<'.'?xml version="1.0"?>' !!}
<rss version="2.0">
    <channel>
        <title>{{ $club->getName() }}</title>
        <description>Flux rss généré via l'application press-book thimes</description>
        <link>{{ route('home') }}</link>
        <language>fr-FR</language>
        <ttl>15</ttl>
        @foreach($club->articles as $article)
            <item>
                <title>{{ $article->getTitle() }}</title>
                <link>{{ $article->getUrl() }}</link>
                <description>{{ $article->getDescription() }}</description>
                <author>{{ $article->getAuthor() }}</author>
                @foreach($article->sports() as $sport)
                    <category>{{ $sport->getName() }}</category>
                @endforeach
                <comment>{{ $article->getComment() }}</comment>
                <guid>{{ $article->getGuid() }}</guid>
                <pubDate>{{ $article->getPubDateWithFormat("ddd, DD MMM Y HH:mm:ss") }} GMT</pubDate>
                <source>{{ $article->getSource() }}</source>
            </item>
        @endforeach
    </channel>
</rss>

