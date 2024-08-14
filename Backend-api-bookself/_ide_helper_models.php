<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $category_name
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Buku> $books
 * @property-read int|null $books_count
 * @method static \Illuminate\Database\Eloquent\Builder|BookCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|BookCategory whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookCategory whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookCategory whereUpdatedAt($value)
 */
	class BookCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $bookcategory_id
 * @property int $quantity
 * @property int $user_id
 * @property string $cover_path
 * @property string $file_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Buku> $bukus
 * @property-read int|null $bukus_count
 * @property-read \App\Models\BookCategory|null $category
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Buku newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Buku newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Buku query()
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereBookcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereCoverPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereUserId($value)
 */
	class Buku extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $fullname
 * @property string $email
 * @property string $phone_number
 * @property string|null $profile_photo
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $phone_number_verified_at
 * @property string $role
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Buku> $books
 * @property-read int|null $books_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumberVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

