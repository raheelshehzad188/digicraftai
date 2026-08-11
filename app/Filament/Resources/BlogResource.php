<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Content';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([
                TextInput::make('title')->required()->maxLength(255),
                TextInput::make('slug')->maxLength(255)->unique(ignoreRecord: true),
                TextInput::make('author')->default('Admin')->maxLength(255),
                TextInput::make('category')->maxLength(255),
                DatePicker::make('published_at')->default(now()),
                TextInput::make('comments_count')->numeric()->default(0),
                TextInput::make('shares_count')->numeric()->default(0),
                FileUpload::make('image')->disk('public')->directory('blogs')->image(),
                FileUpload::make('author_image')->disk('public')->directory('blogs/authors')->image(),
                Textarea::make('excerpt')->rows(3)->columnSpanFull(),
                RichEditor::make('content')->columnSpanFull(),
                Toggle::make('is_published')->default(true),
                TextInput::make('sort_order')->numeric()->default(0),
            ])->columns(2),
            Section::make('SEO')
                ->description('Unique SEO for this blog post.')
                ->schema([
                    TextInput::make('meta_title')
                        ->label('Meta Title')
                        ->maxLength(255)
                        ->helperText('Recommended under 60 characters.'),
                    Textarea::make('meta_description')
                        ->label('Meta Description')
                        ->rows(3)
                        ->helperText('Recommended under 160 characters.')
                        ->columnSpanFull(),
                    TextInput::make('meta_keywords')
                        ->label('Meta Keywords')
                        ->maxLength(255)
                        ->helperText('Comma-separated keywords')
                        ->columnSpanFull(),
                    TextInput::make('og_title')
                        ->label('OG Title')
                        ->maxLength(255),
                    Textarea::make('og_description')
                        ->label('OG Description')
                        ->rows(2)
                        ->columnSpanFull(),
                ])
                ->columns(2)
                ->collapsed(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->disk('public'),
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('author'),
                TextColumn::make('published_at')->date(),
                IconColumn::make('is_published')->boolean(),
                TextColumn::make('sort_order')->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
