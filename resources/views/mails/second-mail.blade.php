<x-mail::message>
# Introduction

Markdown mailable messages allow you to take advantage of the pre-built templates and components of mail notifications in your mailables. Since the messages are written in Markdown, Laravel is able to render beautiful, responsive HTML templates for the messages while also automatically generating a plain-text counterpart.

<x-mail::button :url="$url">
Go to dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
