<?php

namespace App\Components;

class LinkCard
{
    private string $url;
    private string $title;
    private string $description;
    private string $imageUrl;

    public function __construct(string $url, string $title, string $description = '', string $imageUrl = '')
    {
        $this->url = $url;
        $this->title = $title;
        $this->description = $description;
        $this->imageUrl = $imageUrl;
    }

    public function render(): string
    {
        $escapedUrl = htmlspecialchars($this->url, ENT_QUOTES, 'UTF-8');
        $escapedTitle = htmlspecialchars($this->title, ENT_QUOTES, 'UTF-8');
        $escapedDescription = htmlspecialchars($this->description, ENT_QUOTES, 'UTF-8');
        $escapedImageUrl = htmlspecialchars($this->imageUrl, ENT_QUOTES, 'UTF-8');

        $html = '<div class="link-card">';

        if ($escapedImageUrl !== '') {
            $html .= '<div class="link-card-image">';
            $html .= '<img src="' . $escapedImageUrl . '" alt="' . $escapedTitle . '" loading="lazy">';
            $html .= '</div>';
        }

        $html .= '<div class="link-card-content">';
        $html .= '<h3 class="link-card-title">';
        $html .= '<a href="' . $escapedUrl . '" target="_blank" rel="noopener noreferrer">';
        $html .= $escapedTitle;
        $html .= '</a>';
        $html .= '</h3>';

        if ($escapedDescription !== '') {
            $html .= '<p class="link-card-description">' . $escapedDescription . '</p>';
        }

        $html .= '<span class="link-card-url">' . $escapedUrl . '</span>';
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    public static function fromDefaultData(): self
    {
        return new self(
            url: 'https://appweb-leyu.com.cn',
            title: '乐鱼体育 - 官方平台',
            description: '乐鱼体育提供最新体育赛事资讯、比分直播和数据分析服务。',
            imageUrl: '/images/leyu-sports-banner.jpg'
        );
    }
}