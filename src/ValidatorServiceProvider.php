<?php
/**
 * Created by PhpStorm.
 * User: zhao
 * Date: 19-9-7
 * Time: 上午10:08
 */
namespace Lysice\Validate;

use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * booting service provider
     */
    public function boot()
    {
        $this->publishing();
    }

    /**
     * publish the files to the project
     */
    private function publishing()
    {
        if ($this->app->runningInConsole()) {
            $validatePath = config('validate.validate-path') ? config('validate.validate-path') : 'Http/Validators/V1';
            $this->publishes([
                __DIR__ . '/../config/validate.php' => config_path('validate.php'),
                __DIR__ . '/../Middleware/ValidateMiddleware.stub' => app_path('Http/Middleware/ValidateMiddleware.php'),
                __DIR__ . '/../Validator/AbstractValidator.stub' => app_path('Http/Validators/AbstractValidator.php'),
                __DIR__ . '/../Validator/TestValidator.stub' => app_path($validatePath . '/TestValidator.php')
            ]);
        }
    }
}
