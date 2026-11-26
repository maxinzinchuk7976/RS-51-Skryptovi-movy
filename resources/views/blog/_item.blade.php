@php
    $categoryLabel = $blog->category
        ? ($blog->category->title ?? $blog->category->name ?? null)
        : null;
    $categoryLabel = filled($categoryLabel) ? $categoryLabel : null;
@endphp

<article class="blog-card">
    <a href="{{ route('blog.show', $blog) }}">
        <div class="blog-card__image" aria-hidden="true">
        </div>
    </a>

    <div class="blog-card__body">
        <div class="blog-card__meta" >
            @if($categoryLabel)
                <span class="blog-card__category">
                    {{ $categoryLabel }}
                </span>
            @endif

            @if($blog->dt_created)
                <time class="blog-card__date" datetime="{{ \Illuminate\Support\Carbon::parse($blog->dt_created)->toIso8601String() }}">
                    {{ \Illuminate\Support\Carbon::parse($blog->dt_created)->format('d.m.Y') }}
                </time>
            @endif
        </div>
        <a href="{{ route('blog.show', $blog) }}">
            <h2 class="blog-card__title">
                {{ $blog->title }}
            </h2>
        </a>

        <p class="blog-card__description">
            {{ $blog->description ?: \Illuminate\Support\Str::limit(strip_tags($blog->text), 120) }}
        </p>

        @if($blog->author)
            <div class="blog-card__footer">
                <span class="blog-card__author">
                    Автор: {{ $blog->author->name }}
                </span>
            </div>
        @endif
    </div>
</article>

@once
    <style>
        .blog-card {
            display: inline-flex;
            flex-direction: column;
            vertical-align: top;
            width: 340px;
            max-width: calc(100% - 24px);
            margin: 12px;
            background-color: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(15, 23, 42, 0.06);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            box-sizing: border-box;
        }

        .blog-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(15, 23, 42, 0.1);
        }

        .blog-card__image {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 140px;
            background-image: url("{{ asset('images/blog-placeholder.jpg') }}");
            background-size: 100%;
            border-bottom: 1px solid #e2e8f0;
        }

        .blog-card__body {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            padding: 14px 16px;
        }

        .blog-card__meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 10px;
            font-size: 13px;
        }

        .blog-card__category {
            display: inline-block;
            padding: 3px 8px;
            background-color: #eff6ff;
            color: #1d4ed8;
            font-weight: 600;
            border-radius: 6px;
        }

        .blog-card__date {
            color: #64748b;
            margin-left: auto;
        }

        .blog-card__title {
            margin: 0 0 8px;
            font-size: 19px;
            font-weight: 700;
            line-height: 1.3;
            color: #0f172a;
        }

        .blog-card__description {
            margin: 0;
            font-size: 15px;
            line-height: 1.5;
            color: #475569;
            flex-grow: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .blog-card__footer {
            margin-top: 14px;
            padding-top: 10px;
            border-top: 1px solid #f1f5f9;
            font-size: 14px;
            color: #334155;
            font-weight: 500;
        }

        @media (max-width: 480px) {
            .blog-card {
                display: flex;
                width: auto;
                max-width: 100%;
                margin: 10px 0;
            }

            .blog-card__image {
                height: 125px;
            }
        }
    </style>
@endonce
