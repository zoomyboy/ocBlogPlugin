<?php namespace Rainlab\Blog\Models;

use Model;

/**
 * Settings Model
 */
class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'rainlab_blog_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}
