<?php
namespace Illuminate\Contracts\Container {
use Closure;
use Psr\Container\ContainerInterface;
interface Container extends ContainerInterface
{
    public function bound($abstract);
    public function alias($abstract, $alias);
    public function tag($abstracts, $tags);
    public function tagged($tag);
    public function bind($abstract, $concrete = null, $shared = false);
    public function bindIf($abstract, $concrete = null, $shared = false);
    public function singleton($abstract, $concrete = null);
    public function singletonIf($abstract, $concrete = null);
    public function extend($abstract, Closure $closure);
    public function instance($abstract, $instance);
    public function addContextualBinding($concrete, $abstract, $implementation);
    public function when($concrete);
    public function factory($abstract);
    public function flush();
    public function make($abstract, array $parameters = []);
    public function call($callback, array $parameters = [], $defaultMethod = null);
    public function resolved($abstract);
    public function resolving($abstract, Closure $callback = null);
    public function afterResolving($abstract, Closure $callback = null);
}
}

namespace Illuminate\Contracts\Container {
interface ContextualBindingBuilder
{
    public function needs($abstract);
    public function give($implementation);
    public function giveTagged($tag);
}
}

namespace Illuminate\Contracts\Foundation {
use Illuminate\Contracts\Container\Container;
interface Application extends Container
{
    public function version();
    public function basePath($path = '');
    public function bootstrapPath($path = '');
    public function configPath($path = '');
    public function databasePath($path = '');
    public function resourcePath($path = '');
    public function storagePath();
    public function environment(...$environments);
    public function runningInConsole();
    public function runningUnitTests();
    public function isDownForMaintenance();
    public function registerConfiguredProviders();
    public function register($provider, $force = false);
    public function registerDeferredProvider($provider, $service = null);
    public function resolveProvider($provider);
    public function boot();
    public function booting($callback);
    public function booted($callback);
    public function bootstrapWith(array $bootstrappers);
    public function getLocale();
    public function getNamespace();
    public function getProviders($provider);
    public function hasBeenBootstrapped();
    public function loadDeferredProviders();
    public function setLocale($locale);
    public function shouldSkipMiddleware();
    public function terminate();
}
}

namespace Illuminate\Contracts\Bus {
interface Dispatcher
{
    public function dispatch($command);
    public function dispatchSync($command, $handler = null);
    public function dispatchNow($command, $handler = null);
    public function hasCommandHandler($command);
    public function getCommandHandler($command);
    public function pipeThrough(array $pipes);
    public function map(array $map);
}
}

namespace Illuminate\Contracts\Bus {
interface QueueingDispatcher extends Dispatcher
{
    public function findBatch(string $batchId);
    public function batch($jobs);
    public function dispatchToQueue($command);
}
}

namespace Illuminate\Contracts\Pipeline {
use Closure;
interface Pipeline
{
    public function send($traveler);
    public function through($stops);
    public function via($method);
    public function then(Closure $destination);
}
}

namespace Illuminate\Contracts\Support {
interface Renderable
{
    public function render();
}
}

namespace Illuminate\Contracts\Debug {
use Throwable;
interface ExceptionHandler
{
    public function report(Throwable $e);
    public function shouldReport(Throwable $e);
    public function render($request, Throwable $e);
    public function renderForConsole($output, Throwable $e);
}
}

namespace Illuminate\Contracts\Config {
interface Repository
{
    public function has($key);
    public function get($key, $default = null);
    public function all();
    public function set($key, $value = null);
    public function prepend($key, $value);
    public function push($key, $value);
}
}

namespace Illuminate\Contracts\Events {
interface Dispatcher
{
    public function listen($events, $listener = null);
    public function hasListeners($eventName);
    public function subscribe($subscriber);
    public function until($event, $payload = []);
    public function dispatch($event, $payload = [], $halt = false);
    public function push($event, $payload = []);
    public function flush($event);
    public function forget($event);
    public function forgetPushed();
}
}

namespace Illuminate\Contracts\Support {
interface Arrayable
{
    public function toArray();
}
}

namespace Illuminate\Contracts\Support {
interface Jsonable
{
    public function toJson($options = 0);
}
}

namespace Illuminate\Contracts\Cookie {
interface Factory
{
    public function make($name, $value, $minutes = 0, $path = null, $domain = null, $secure = null, $httpOnly = true, $raw = false, $sameSite = null);
    public function forever($name, $value, $path = null, $domain = null, $secure = null, $httpOnly = true, $raw = false, $sameSite = null);
    public function forget($name, $path = null, $domain = null);
}
}

namespace Illuminate\Contracts\Cookie {
interface QueueingFactory extends Factory
{
    public function queue(...$parameters);
    public function unqueue($name, $path = null);
    public function getQueuedCookies();
}
}

namespace Illuminate\Contracts\Encryption {
interface Encrypter
{
    public function encrypt($value, $serialize = true);
    public function decrypt($payload, $unserialize = true);
}
}

namespace Illuminate\Contracts\Queue {
interface QueueableEntity
{
    public function getQueueableId();
    public function getQueueableRelations();
    public function getQueueableConnection();
}
}

namespace Illuminate\Contracts\Routing {
interface Registrar
{
    public function get($uri, $action);
    public function post($uri, $action);
    public function put($uri, $action);
    public function delete($uri, $action);
    public function patch($uri, $action);
    public function options($uri, $action);
    public function match($methods, $uri, $action);
    public function resource($name, $controller, array $options = []);
    public function group(array $attributes, $routes);
    public function substituteBindings($route);
    public function substituteImplicitBindings($route);
}
}

namespace Illuminate\Contracts\Routing {
interface ResponseFactory
{
    public function make($content = '', $status = 200, array $headers = []);
    public function noContent($status = 204, array $headers = []);
    public function view($view, $data = [], $status = 200, array $headers = []);
    public function json($data = [], $status = 200, array $headers = [], $options = 0);
    public function jsonp($callback, $data = [], $status = 200, array $headers = [], $options = 0);
    public function stream($callback, $status = 200, array $headers = []);
    public function streamDownload($callback, $name = null, array $headers = [], $disposition = 'attachment');
    public function download($file, $name = null, array $headers = [], $disposition = 'attachment');
    public function file($file, array $headers = []);
    public function redirectTo($path, $status = 302, $headers = [], $secure = null);
    public function redirectToRoute($route, $parameters = [], $status = 302, $headers = []);
    public function redirectToAction($action, $parameters = [], $status = 302, $headers = []);
    public function redirectGuest($path, $status = 302, $headers = [], $secure = null);
    public function redirectToIntended($default = '/', $status = 302, $headers = [], $secure = null);
}
}

namespace Illuminate\Contracts\Routing {
interface UrlGenerator
{
    public function current();
    public function previous($fallback = false);
    public function to($path, $extra = [], $secure = null);
    public function secure($path, $parameters = []);
    public function asset($path, $secure = null);
    public function route($name, $parameters = [], $absolute = true);
    public function action($action, $parameters = [], $absolute = true);
    public function setRootControllerNamespace($rootNamespace);
}
}

namespace Illuminate\Contracts\Routing {
interface UrlRoutable
{
    public function getRouteKey();
    public function getRouteKeyName();
    public function resolveRouteBinding($value, $field = null);
    public function resolveChildRouteBinding($childType, $value, $field);
}
}

namespace Illuminate\Contracts\Validation {
interface ValidatesWhenResolved
{
    public function validateResolved();
}
}

namespace Illuminate\Contracts\View {
interface Factory
{
    public function exists($view);
    public function file($path, $data = [], $mergeData = []);
    public function make($view, $data = [], $mergeData = []);
    public function share($key, $value = null);
    public function composer($views, $callback);
    public function creator($views, $callback);
    public function addNamespace($namespace, $hints);
    public function replaceNamespace($namespace, $hints);
}
}

namespace Illuminate\Contracts\Support {
interface MessageProvider
{
    public function getMessageBag();
}
}

namespace Illuminate\Contracts\Support {
use Countable;
interface MessageBag extends Arrayable, Countable
{
    public function keys();
    public function add($key, $message);
    public function merge($messages);
    public function has($key);
    public function first($key = null, $format = null);
    public function get($key, $format = null);
    public function all($format = null);
    public function getMessages();
    public function getFormat();
    public function setFormat($format = ':message');
    public function isEmpty();
    public function isNotEmpty();
}
}

namespace Illuminate\Contracts\View {
use Illuminate\Contracts\Support\Renderable;
interface View extends Renderable
{
    public function name();
    public function with($key, $value = null);
    public function getData();
}
}

namespace Illuminate\Contracts\Http {
interface Kernel
{
    public function bootstrap();
    public function handle($request);
    public function terminate($request, $response);
    public function getApplication();
}
}

namespace Illuminate\Contracts\Auth {
interface Guard
{
    public function check();
    public function guest();
    public function user();
    public function id();
    public function validate(array $credentials = []);
    public function setUser(Authenticatable $user);
}
}

namespace Illuminate\Contracts\Auth {
interface StatefulGuard extends Guard
{
    public function attempt(array $credentials = [], $remember = false);
    public function once(array $credentials = []);
    public function login(Authenticatable $user, $remember = false);
    public function loginUsingId($id, $remember = false);
    public function onceUsingId($id);
    public function viaRemember();
    public function logout();
}
}

namespace Illuminate\Contracts\Auth\Access {
interface Gate
{
    public function has($ability);
    public function define($ability, $callback);
    public function resource($name, $class, array $abilities = null);
    public function policy($class, $policy);
    public function before(callable $callback);
    public function after(callable $callback);
    public function allows($ability, $arguments = []);
    public function denies($ability, $arguments = []);
    public function check($abilities, $arguments = []);
    public function any($abilities, $arguments = []);
    public function authorize($ability, $arguments = []);
    public function inspect($ability, $arguments = []);
    public function raw($ability, $arguments = []);
    public function getPolicyFor($class);
    public function forUser($user);
    public function abilities();
}
}

namespace Illuminate\Contracts\Hashing {
interface Hasher
{
    public function info($hashedValue);
    public function make($value, array $options = []);
    public function check($value, $hashedValue, array $options = []);
    public function needsRehash($hashedValue, array $options = []);
}
}

namespace Illuminate\Contracts\Auth {
interface UserProvider
{
    public function retrieveById($identifier);
    public function retrieveByToken($identifier, $token);
    public function updateRememberToken(Authenticatable $user, $token);
    public function retrieveByCredentials(array $credentials);
    public function validateCredentials(Authenticatable $user, array $credentials);
}
}

namespace Illuminate\Contracts\Pagination {
interface Paginator
{
    public function url($page);
    public function appends($key, $value = null);
    public function fragment($fragment = null);
    public function nextPageUrl();
    public function previousPageUrl();
    public function items();
    public function firstItem();
    public function lastItem();
    public function perPage();
    public function currentPage();
    public function hasPages();
    public function hasMorePages();
    public function path();
    public function isEmpty();
    public function isNotEmpty();
    public function render($view = null, $data = []);
}
}

namespace Illuminate\Auth {
use Closure;
use Illuminate\Contracts\Auth\Factory as FactoryContract;
use InvalidArgumentException;
class AuthManager implements FactoryContract
{
    use CreatesUserProviders;
    protected $app;
    protected $customCreators = [];
    protected $guards = [];
    protected $userResolver;
    public function __construct($app)
    {
        $this->app = $app;
        $this->userResolver = function ($guard = null) {
            return $this->guard($guard)->user();
        };
    }
    public function guard($name = null)
    {
        $name = $name ?: $this->getDefaultDriver();
        return $this->guards[$name] ?? ($this->guards[$name] = $this->resolve($name));
    }
    protected function resolve($name)
    {
        $config = $this->getConfig($name);
        if (is_null($config)) {
            throw new InvalidArgumentException("Auth guard [{$name}] is not defined.");
        }
        if (isset($this->customCreators[$config['driver']])) {
            return $this->callCustomCreator($name, $config);
        }
        $driverMethod = 'create' . ucfirst($config['driver']) . 'Driver';
        if (method_exists($this, $driverMethod)) {
            return $this->{$driverMethod}($name, $config);
        }
        throw new InvalidArgumentException("Auth driver [{$config['driver']}] for guard [{$name}] is not defined.");
    }
    protected function callCustomCreator($name, array $config)
    {
        return $this->customCreators[$config['driver']]($this->app, $name, $config);
    }
    public function createSessionDriver($name, $config)
    {
        $provider = $this->createUserProvider($config['provider'] ?? null);
        $guard = new SessionGuard($name, $provider, $this->app['session.store']);
        if (method_exists($guard, 'setCookieJar')) {
            $guard->setCookieJar($this->app['cookie']);
        }
        if (method_exists($guard, 'setDispatcher')) {
            $guard->setDispatcher($this->app['events']);
        }
        if (method_exists($guard, 'setRequest')) {
            $guard->setRequest($this->app->refresh('request', $guard, 'setRequest'));
        }
        if (isset($config['remember'])) {
            $guard->setRememberDuration($config['remember']);
        }
        return $guard;
    }
    public function createTokenDriver($name, $config)
    {
        $guard = new TokenGuard($this->createUserProvider($config['provider'] ?? null), $this->app['request'], $config['input_key'] ?? 'api_token', $config['storage_key'] ?? 'api_token', $config['hash'] ?? false);
        $this->app->refresh('request', $guard, 'setRequest');
        return $guard;
    }
    protected function getConfig($name)
    {
        return $this->app['config']["auth.guards.{$name}"];
    }
    public function getDefaultDriver()
    {
        return $this->app['config']['auth.defaults.guard'];
    }
    public function shouldUse($name)
    {
        $name = $name ?: $this->getDefaultDriver();
        $this->setDefaultDriver($name);
        $this->userResolver = function ($name = null) {
            return $this->guard($name)->user();
        };
    }
    public function setDefaultDriver($name)
    {
        $this->app['config']['auth.defaults.guard'] = $name;
    }
    public function viaRequest($driver, callable $callback)
    {
        return $this->extend($driver, function () use($callback) {
            $guard = new RequestGuard($callback, $this->app['request'], $this->createUserProvider());
            $this->app->refresh('request', $guard, 'setRequest');
            return $guard;
        });
    }
    public function userResolver()
    {
        return $this->userResolver;
    }
    public function resolveUsersUsing(Closure $userResolver)
    {
        $this->userResolver = $userResolver;
        return $this;
    }
    public function extend($driver, Closure $callback)
    {
        $this->customCreators[$driver] = $callback;
        return $this;
    }
    public function provider($name, Closure $callback)
    {
        $this->customProviderCreators[$name] = $callback;
        return $this;
    }
    public function hasResolvedGuards()
    {
        return count($this->guards) > 0;
    }
    public function forgetGuards()
    {
        $this->guards = [];
        return $this;
    }
    public function setApplication($app)
    {
        $this->app = $app;
        return $this;
    }
    public function __call($method, $parameters)
    {
        return $this->guard()->{$method}(...$parameters);
    }
}
}

namespace Illuminate\Auth {
use Illuminate\Auth\Events\Attempting;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Auth\Events\CurrentDeviceLogout;
use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\OtherDeviceLogout;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Auth\SupportsBasicAuth;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Cookie\QueueingFactory as CookieJar;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Traits\Macroable;
use InvalidArgumentException;
use RuntimeException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
class SessionGuard implements StatefulGuard, SupportsBasicAuth
{
    use GuardHelpers, Macroable;
    protected $name;
    protected $lastAttempted;
    protected $viaRemember = false;
    protected $rememberDuration = 2628000;
    protected $session;
    protected $cookie;
    protected $request;
    protected $events;
    protected $loggedOut = false;
    protected $recallAttempted = false;
    public function __construct($name, UserProvider $provider, Session $session, Request $request = null)
    {
        $this->name = $name;
        $this->session = $session;
        $this->request = $request;
        $this->provider = $provider;
    }
    public function user()
    {
        if ($this->loggedOut) {
            return;
        }
        if (!is_null($this->user)) {
            return $this->user;
        }
        $id = $this->session->get($this->getName());
        if (!is_null($id) && ($this->user = $this->provider->retrieveById($id))) {
            $this->fireAuthenticatedEvent($this->user);
        }
        if (is_null($this->user) && !is_null($recaller = $this->recaller())) {
            $this->user = $this->userFromRecaller($recaller);
            if ($this->user) {
                $this->updateSession($this->user->getAuthIdentifier());
                $this->fireLoginEvent($this->user, true);
            }
        }
        return $this->user;
    }
    protected function userFromRecaller($recaller)
    {
        if (!$recaller->valid() || $this->recallAttempted) {
            return;
        }
        $this->recallAttempted = true;
        $this->viaRemember = !is_null($user = $this->provider->retrieveByToken($recaller->id(), $recaller->token()));
        return $user;
    }
    protected function recaller()
    {
        if (is_null($this->request)) {
            return;
        }
        if ($recaller = $this->request->cookies->get($this->getRecallerName())) {
            return new Recaller($recaller);
        }
    }
    public function id()
    {
        if ($this->loggedOut) {
            return;
        }
        return $this->user() ? $this->user()->getAuthIdentifier() : $this->session->get($this->getName());
    }
    public function once(array $credentials = [])
    {
        $this->fireAttemptEvent($credentials);
        if ($this->validate($credentials)) {
            $this->setUser($this->lastAttempted);
            return true;
        }
        return false;
    }
    public function onceUsingId($id)
    {
        if (!is_null($user = $this->provider->retrieveById($id))) {
            $this->setUser($user);
            return $user;
        }
        return false;
    }
    public function validate(array $credentials = [])
    {
        $this->lastAttempted = $user = $this->provider->retrieveByCredentials($credentials);
        return $this->hasValidCredentials($user, $credentials);
    }
    public function basic($field = 'email', $extraConditions = [])
    {
        if ($this->check()) {
            return;
        }
        if ($this->attemptBasic($this->getRequest(), $field, $extraConditions)) {
            return;
        }
        return $this->failedBasicResponse();
    }
    public function onceBasic($field = 'email', $extraConditions = [])
    {
        $credentials = $this->basicCredentials($this->getRequest(), $field);
        if (!$this->once(array_merge($credentials, $extraConditions))) {
            return $this->failedBasicResponse();
        }
    }
    protected function attemptBasic(Request $request, $field, $extraConditions = [])
    {
        if (!$request->getUser()) {
            return false;
        }
        return $this->attempt(array_merge($this->basicCredentials($request, $field), $extraConditions));
    }
    protected function basicCredentials(Request $request, $field)
    {
        return [$field => $request->getUser(), 'password' => $request->getPassword()];
    }
    protected function failedBasicResponse()
    {
        throw new UnauthorizedHttpException('Basic', 'Invalid credentials.');
    }
    public function attempt(array $credentials = [], $remember = false)
    {
        $this->fireAttemptEvent($credentials, $remember);
        $this->lastAttempted = $user = $this->provider->retrieveByCredentials($credentials);
        if ($this->hasValidCredentials($user, $credentials)) {
            $this->login($user, $remember);
            return true;
        }
        $this->fireFailedEvent($user, $credentials);
        return false;
    }
    public function attemptWhen(array $credentials = [], $callbacks = null, $remember = false)
    {
        $this->fireAttemptEvent($credentials, $remember);
        $this->lastAttempted = $user = $this->provider->retrieveByCredentials($credentials);
        if ($this->hasValidCredentials($user, $credentials) && $this->shouldLogin($callbacks, $user)) {
            $this->login($user, $remember);
            return true;
        }
        $this->fireFailedEvent($user, $credentials);
        return false;
    }
    protected function hasValidCredentials($user, $credentials)
    {
        $validated = !is_null($user) && $this->provider->validateCredentials($user, $credentials);
        if ($validated) {
            $this->fireValidatedEvent($user);
        }
        return $validated;
    }
    protected function shouldLogin($callbacks, AuthenticatableContract $user)
    {
        foreach (Arr::wrap($callbacks) as $callback) {
            if (!$callback($user, $this)) {
                return false;
            }
        }
        return true;
    }
    public function loginUsingId($id, $remember = false)
    {
        if (!is_null($user = $this->provider->retrieveById($id))) {
            $this->login($user, $remember);
            return $user;
        }
        return false;
    }
    public function login(AuthenticatableContract $user, $remember = false)
    {
        $this->updateSession($user->getAuthIdentifier());
        if ($remember) {
            $this->ensureRememberTokenIsSet($user);
            $this->queueRecallerCookie($user);
        }
        $this->fireLoginEvent($user, $remember);
        $this->setUser($user);
    }
    protected function updateSession($id)
    {
        $this->session->put($this->getName(), $id);
        $this->session->migrate(true);
    }
    protected function ensureRememberTokenIsSet(AuthenticatableContract $user)
    {
        if (empty($user->getRememberToken())) {
            $this->cycleRememberToken($user);
        }
    }
    protected function queueRecallerCookie(AuthenticatableContract $user)
    {
        $this->getCookieJar()->queue($this->createRecaller($user->getAuthIdentifier() . '|' . $user->getRememberToken() . '|' . $user->getAuthPassword()));
    }
    protected function createRecaller($value)
    {
        return $this->getCookieJar()->make($this->getRecallerName(), $value, $this->getRememberDuration());
    }
    public function logout()
    {
        $user = $this->user();
        $this->clearUserDataFromStorage();
        if (!is_null($this->user) && !empty($user->getRememberToken())) {
            $this->cycleRememberToken($user);
        }
        if (isset($this->events)) {
            $this->events->dispatch(new Logout($this->name, $user));
        }
        $this->user = null;
        $this->loggedOut = true;
    }
    public function logoutCurrentDevice()
    {
        $user = $this->user();
        $this->clearUserDataFromStorage();
        if (isset($this->events)) {
            $this->events->dispatch(new CurrentDeviceLogout($this->name, $user));
        }
        $this->user = null;
        $this->loggedOut = true;
    }
    protected function clearUserDataFromStorage()
    {
        $this->session->remove($this->getName());
        if (!is_null($this->recaller())) {
            $this->getCookieJar()->queue($this->getCookieJar()->forget($this->getRecallerName()));
        }
    }
    protected function cycleRememberToken(AuthenticatableContract $user)
    {
        $user->setRememberToken($token = Str::random(60));
        $this->provider->updateRememberToken($user, $token);
    }
    public function logoutOtherDevices($password, $attribute = 'password')
    {
        if (!$this->user()) {
            return;
        }
        $result = $this->rehashUserPassword($password, $attribute);
        if ($this->recaller() || $this->getCookieJar()->hasQueued($this->getRecallerName())) {
            $this->queueRecallerCookie($this->user());
        }
        $this->fireOtherDeviceLogoutEvent($this->user());
        return $result;
    }
    protected function rehashUserPassword($password, $attribute)
    {
        if (!Hash::check($password, $this->user()->{$attribute})) {
            throw new InvalidArgumentException('The given password does not match the current password.');
        }
        return tap($this->user()->forceFill([$attribute => Hash::make($password)]))->save();
    }
    public function attempting($callback)
    {
        if (isset($this->events)) {
            $this->events->listen(Events\Attempting::class, $callback);
        }
    }
    protected function fireAttemptEvent(array $credentials, $remember = false)
    {
        if (isset($this->events)) {
            $this->events->dispatch(new Attempting($this->name, $credentials, $remember));
        }
    }
    protected function fireValidatedEvent($user)
    {
        if (isset($this->events)) {
            $this->events->dispatch(new Validated($this->name, $user));
        }
    }
    protected function fireLoginEvent($user, $remember = false)
    {
        if (isset($this->events)) {
            $this->events->dispatch(new Login($this->name, $user, $remember));
        }
    }
    protected function fireAuthenticatedEvent($user)
    {
        if (isset($this->events)) {
            $this->events->dispatch(new Authenticated($this->name, $user));
        }
    }
    protected function fireOtherDeviceLogoutEvent($user)
    {
        if (isset($this->events)) {
            $this->events->dispatch(new OtherDeviceLogout($this->name, $user));
        }
    }
    protected function fireFailedEvent($user, array $credentials)
    {
        if (isset($this->events)) {
            $this->events->dispatch(new Failed($this->name, $user, $credentials));
        }
    }
    public function getLastAttempted()
    {
        return $this->lastAttempted;
    }
    public function getName()
    {
        return 'login_' . $this->name . '_' . sha1(static::class);
    }
    public function getRecallerName()
    {
        return 'remember_' . $this->name . '_' . sha1(static::class);
    }
    public function viaRemember()
    {
        return $this->viaRemember;
    }
    protected function getRememberDuration()
    {
        return $this->rememberDuration;
    }
    public function setRememberDuration($minutes)
    {
        $this->rememberDuration = $minutes;
        return $this;
    }
    public function getCookieJar()
    {
        if (!isset($this->cookie)) {
            throw new RuntimeException('Cookie jar has not been set.');
        }
        return $this->cookie;
    }
    public function setCookieJar(CookieJar $cookie)
    {
        $this->cookie = $cookie;
    }
    public function getDispatcher()
    {
        return $this->events;
    }
    public function setDispatcher(Dispatcher $events)
    {
        $this->events = $events;
    }
    public function getSession()
    {
        return $this->session;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function setUser(AuthenticatableContract $user)
    {
        $this->user = $user;
        $this->loggedOut = false;
        $this->fireAuthenticatedEvent($user);
        return $this;
    }
    public function getRequest()
    {
        return $this->request ?: Request::createFromGlobals();
    }
    public function setRequest(Request $request)
    {
        $this->request = $request;
        return $this;
    }
}
}

namespace Illuminate\Auth\Access {
use Closure;
use Exception;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use InvalidArgumentException;
use ReflectionClass;
use ReflectionFunction;
class Gate implements GateContract
{
    use HandlesAuthorization;
    protected $container;
    protected $userResolver;
    protected $abilities = [];
    protected $policies = [];
    protected $beforeCallbacks = [];
    protected $afterCallbacks = [];
    protected $stringCallbacks = [];
    protected $guessPolicyNamesUsingCallback;
    public function __construct(Container $container, callable $userResolver, array $abilities = [], array $policies = [], array $beforeCallbacks = [], array $afterCallbacks = [], callable $guessPolicyNamesUsingCallback = null)
    {
        $this->policies = $policies;
        $this->container = $container;
        $this->abilities = $abilities;
        $this->userResolver = $userResolver;
        $this->afterCallbacks = $afterCallbacks;
        $this->beforeCallbacks = $beforeCallbacks;
        $this->guessPolicyNamesUsingCallback = $guessPolicyNamesUsingCallback;
    }
    public function has($ability)
    {
        $abilities = is_array($ability) ? $ability : func_get_args();
        foreach ($abilities as $ability) {
            if (!isset($this->abilities[$ability])) {
                return false;
            }
        }
        return true;
    }
    public function allowIf($condition, $message = null, $code = null)
    {
        return $this->authorizeOnDemand($condition, $message, $code, true);
    }
    public function denyIf($condition, $message = null, $code = null)
    {
        return $this->authorizeOnDemand($condition, $message, $code, false);
    }
    protected function authorizeOnDemand($condition, $message, $code, $allowWhenResponseIs)
    {
        $user = $this->resolveUser();
        if ($condition instanceof Closure) {
            $response = $this->canBeCalledWithUser($user, $condition) ? $condition($user) : new Response(false, $message, $code);
        } else {
            $response = $condition;
        }
        return with($response instanceof Response ? $response : new Response((bool) $response === $allowWhenResponseIs, $message, $code))->authorize();
    }
    public function define($ability, $callback)
    {
        if (is_array($callback) && isset($callback[0]) && is_string($callback[0])) {
            $callback = $callback[0] . '@' . $callback[1];
        }
        if (is_callable($callback)) {
            $this->abilities[$ability] = $callback;
        } elseif (is_string($callback)) {
            $this->stringCallbacks[$ability] = $callback;
            $this->abilities[$ability] = $this->buildAbilityCallback($ability, $callback);
        } else {
            throw new InvalidArgumentException("Callback must be a callable or a 'Class@method' string.");
        }
        return $this;
    }
    public function resource($name, $class, array $abilities = null)
    {
        $abilities = $abilities ?: ['viewAny' => 'viewAny', 'view' => 'view', 'create' => 'create', 'update' => 'update', 'delete' => 'delete'];
        foreach ($abilities as $ability => $method) {
            $this->define($name . '.' . $ability, $class . '@' . $method);
        }
        return $this;
    }
    protected function buildAbilityCallback($ability, $callback)
    {
        return function () use($ability, $callback) {
            if (Str::contains($callback, '@')) {
                [$class, $method] = Str::parseCallback($callback);
            } else {
                $class = $callback;
            }
            $policy = $this->resolvePolicy($class);
            $arguments = func_get_args();
            $user = array_shift($arguments);
            $result = $this->callPolicyBefore($policy, $user, $ability, $arguments);
            if (!is_null($result)) {
                return $result;
            }
            return isset($method) ? $policy->{$method}(...func_get_args()) : $policy(...func_get_args());
        };
    }
    public function policy($class, $policy)
    {
        $this->policies[$class] = $policy;
        return $this;
    }
    public function before(callable $callback)
    {
        $this->beforeCallbacks[] = $callback;
        return $this;
    }
    public function after(callable $callback)
    {
        $this->afterCallbacks[] = $callback;
        return $this;
    }
    public function allows($ability, $arguments = [])
    {
        return $this->check($ability, $arguments);
    }
    public function denies($ability, $arguments = [])
    {
        return !$this->allows($ability, $arguments);
    }
    public function check($abilities, $arguments = [])
    {
        return collect($abilities)->every(function ($ability) use($arguments) {
            return $this->inspect($ability, $arguments)->allowed();
        });
    }
    public function any($abilities, $arguments = [])
    {
        return collect($abilities)->contains(function ($ability) use($arguments) {
            return $this->check($ability, $arguments);
        });
    }
    public function none($abilities, $arguments = [])
    {
        return !$this->any($abilities, $arguments);
    }
    public function authorize($ability, $arguments = [])
    {
        return $this->inspect($ability, $arguments)->authorize();
    }
    public function inspect($ability, $arguments = [])
    {
        try {
            $result = $this->raw($ability, $arguments);
            if ($result instanceof Response) {
                return $result;
            }
            return $result ? Response::allow() : Response::deny();
        } catch (AuthorizationException $e) {
            return $e->toResponse();
        }
    }
    public function raw($ability, $arguments = [])
    {
        $arguments = Arr::wrap($arguments);
        $user = $this->resolveUser();
        $result = $this->callBeforeCallbacks($user, $ability, $arguments);
        if (is_null($result)) {
            $result = $this->callAuthCallback($user, $ability, $arguments);
        }
        return tap($this->callAfterCallbacks($user, $ability, $arguments, $result), function ($result) use($user, $ability, $arguments) {
            $this->dispatchGateEvaluatedEvent($user, $ability, $arguments, $result);
        });
    }
    protected function canBeCalledWithUser($user, $class, $method = null)
    {
        if (!is_null($user)) {
            return true;
        }
        if (!is_null($method)) {
            return $this->methodAllowsGuests($class, $method);
        }
        if (is_array($class)) {
            $className = is_string($class[0]) ? $class[0] : get_class($class[0]);
            return $this->methodAllowsGuests($className, $class[1]);
        }
        return $this->callbackAllowsGuests($class);
    }
    protected function methodAllowsGuests($class, $method)
    {
        try {
            $reflection = new ReflectionClass($class);
            $method = $reflection->getMethod($method);
        } catch (Exception $e) {
            return false;
        }
        if ($method) {
            $parameters = $method->getParameters();
            return isset($parameters[0]) && $this->parameterAllowsGuests($parameters[0]);
        }
        return false;
    }
    protected function callbackAllowsGuests($callback)
    {
        $parameters = (new ReflectionFunction($callback))->getParameters();
        return isset($parameters[0]) && $this->parameterAllowsGuests($parameters[0]);
    }
    protected function parameterAllowsGuests($parameter)
    {
        return $parameter->hasType() && $parameter->allowsNull() || $parameter->isDefaultValueAvailable() && is_null($parameter->getDefaultValue());
    }
    protected function callAuthCallback($user, $ability, array $arguments)
    {
        $callback = $this->resolveAuthCallback($user, $ability, $arguments);
        return $callback($user, ...$arguments);
    }
    protected function callBeforeCallbacks($user, $ability, array $arguments)
    {
        foreach ($this->beforeCallbacks as $before) {
            if (!$this->canBeCalledWithUser($user, $before)) {
                continue;
            }
            if (!is_null($result = $before($user, $ability, $arguments))) {
                return $result;
            }
        }
    }
    protected function callAfterCallbacks($user, $ability, array $arguments, $result)
    {
        foreach ($this->afterCallbacks as $after) {
            if (!$this->canBeCalledWithUser($user, $after)) {
                continue;
            }
            $afterResult = $after($user, $ability, $result, $arguments);
            $result = $result ?? $afterResult;
        }
        return $result;
    }
    protected function dispatchGateEvaluatedEvent($user, $ability, array $arguments, $result)
    {
        if ($this->container->bound(Dispatcher::class)) {
            $this->container->make(Dispatcher::class)->dispatch(new Events\GateEvaluated($user, $ability, $result, $arguments));
        }
    }
    protected function resolveAuthCallback($user, $ability, array $arguments)
    {
        if (isset($arguments[0]) && !is_null($policy = $this->getPolicyFor($arguments[0])) && ($callback = $this->resolvePolicyCallback($user, $ability, $arguments, $policy))) {
            return $callback;
        }
        if (isset($this->stringCallbacks[$ability])) {
            [$class, $method] = Str::parseCallback($this->stringCallbacks[$ability]);
            if ($this->canBeCalledWithUser($user, $class, $method ?: '__invoke')) {
                return $this->abilities[$ability];
            }
        }
        if (isset($this->abilities[$ability]) && $this->canBeCalledWithUser($user, $this->abilities[$ability])) {
            return $this->abilities[$ability];
        }
        return function () {
        };
    }
    public function getPolicyFor($class)
    {
        if (is_object($class)) {
            $class = get_class($class);
        }
        if (!is_string($class)) {
            return;
        }
        if (isset($this->policies[$class])) {
            return $this->resolvePolicy($this->policies[$class]);
        }
        foreach ($this->guessPolicyName($class) as $guessedPolicy) {
            if (class_exists($guessedPolicy)) {
                return $this->resolvePolicy($guessedPolicy);
            }
        }
        foreach ($this->policies as $expected => $policy) {
            if (is_subclass_of($class, $expected)) {
                return $this->resolvePolicy($policy);
            }
        }
    }
    protected function guessPolicyName($class)
    {
        if ($this->guessPolicyNamesUsingCallback) {
            return Arr::wrap(call_user_func($this->guessPolicyNamesUsingCallback, $class));
        }
        $classDirname = str_replace('/', '\\', dirname(str_replace('\\', '/', $class)));
        $classDirnameSegments = explode('\\', $classDirname);
        return Arr::wrap(Collection::times(count($classDirnameSegments), function ($index) use($class, $classDirnameSegments) {
            $classDirname = implode('\\', array_slice($classDirnameSegments, 0, $index));
            return $classDirname . '\\Policies\\' . class_basename($class) . 'Policy';
        })->reverse()->values()->first(function ($class) {
            return class_exists($class);
        }) ?: [$classDirname . '\\Policies\\' . class_basename($class) . 'Policy']);
    }
    public function guessPolicyNamesUsing(callable $callback)
    {
        $this->guessPolicyNamesUsingCallback = $callback;
        return $this;
    }
    public function resolvePolicy($class)
    {
        return $this->container->make($class);
    }
    protected function resolvePolicyCallback($user, $ability, array $arguments, $policy)
    {
        if (!is_callable([$policy, $this->formatAbilityToMethod($ability)])) {
            return false;
        }
        return function () use($user, $ability, $arguments, $policy) {
            $result = $this->callPolicyBefore($policy, $user, $ability, $arguments);
            if (!is_null($result)) {
                return $result;
            }
            $method = $this->formatAbilityToMethod($ability);
            return $this->callPolicyMethod($policy, $method, $user, $arguments);
        };
    }
    protected function callPolicyBefore($policy, $user, $ability, $arguments)
    {
        if (!method_exists($policy, 'before')) {
            return;
        }
        if ($this->canBeCalledWithUser($user, $policy, 'before')) {
            return $policy->before($user, $ability, ...$arguments);
        }
    }
    protected function callPolicyMethod($policy, $method, $user, array $arguments)
    {
        if (isset($arguments[0]) && is_string($arguments[0])) {
            array_shift($arguments);
        }
        if (!is_callable([$policy, $method])) {
            return;
        }
        if ($this->canBeCalledWithUser($user, $policy, $method)) {
            return $policy->{$method}($user, ...$arguments);
        }
    }
    protected function formatAbilityToMethod($ability)
    {
        return strpos($ability, '-') !== false ? Str::camel($ability) : $ability;
    }
    public function forUser($user)
    {
        $callback = function () use($user) {
            return $user;
        };
        return new static($this->container, $callback, $this->abilities, $this->policies, $this->beforeCallbacks, $this->afterCallbacks, $this->guessPolicyNamesUsingCallback);
    }
    protected function resolveUser()
    {
        return call_user_func($this->userResolver);
    }
    public function abilities()
    {
        return $this->abilities;
    }
    public function policies()
    {
        return $this->policies;
    }
    public function setContainer(Container $container)
    {
        $this->container = $container;
        return $this;
    }
}
}

namespace Illuminate\Auth {
use Closure;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;
class EloquentUserProvider implements UserProvider
{
    protected $hasher;
    protected $model;
    public function __construct(HasherContract $hasher, $model)
    {
        $this->model = $model;
        $this->hasher = $hasher;
    }
    public function retrieveById($identifier)
    {
        $model = $this->createModel();
        return $this->newModelQuery($model)->where($model->getAuthIdentifierName(), $identifier)->first();
    }
    public function retrieveByToken($identifier, $token)
    {
        $model = $this->createModel();
        $retrievedModel = $this->newModelQuery($model)->where($model->getAuthIdentifierName(), $identifier)->first();
        if (!$retrievedModel) {
            return;
        }
        $rememberToken = $retrievedModel->getRememberToken();
        return $rememberToken && hash_equals($rememberToken, $token) ? $retrievedModel : null;
    }
    public function updateRememberToken(UserContract $user, $token)
    {
        $user->setRememberToken($token);
        $timestamps = $user->timestamps;
        $user->timestamps = false;
        $user->save();
        $user->timestamps = $timestamps;
    }
    public function retrieveByCredentials(array $credentials)
    {
        if (empty($credentials) || count($credentials) === 1 && Str::contains($this->firstCredentialKey($credentials), 'password')) {
            return;
        }
        $query = $this->newModelQuery();
        foreach ($credentials as $key => $value) {
            if (Str::contains($key, 'password')) {
                continue;
            }
            if (is_array($value) || $value instanceof Arrayable) {
                $query->whereIn($key, $value);
            } elseif ($value instanceof Closure) {
                $value($query);
            } else {
                $query->where($key, $value);
            }
        }
        return $query->first();
    }
    protected function firstCredentialKey(array $credentials)
    {
        foreach ($credentials as $key => $value) {
            return $key;
        }
    }
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['password'];
        return $this->hasher->check($plain, $user->getAuthPassword());
    }
    protected function newModelQuery($model = null)
    {
        return is_null($model) ? $this->createModel()->newQuery() : $model->newQuery();
    }
    public function createModel()
    {
        $class = '\\' . ltrim($this->model, '\\');
        return new $class();
    }
    public function getHasher()
    {
        return $this->hasher;
    }
    public function setHasher(HasherContract $hasher)
    {
        $this->hasher = $hasher;
        return $this;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }
}
}

namespace Illuminate\Auth {
use Illuminate\Auth\Access\Gate;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;
class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerAuthenticator();
        $this->registerUserResolver();
        $this->registerAccessGate();
        $this->registerRequirePassword();
        $this->registerRequestRebindHandler();
        $this->registerEventRebindHandler();
    }
    protected function registerAuthenticator()
    {
        $this->app->singleton('auth', function ($app) {
            return new AuthManager($app);
        });
        $this->app->singleton('auth.driver', function ($app) {
            return $app['auth']->guard();
        });
    }
    protected function registerUserResolver()
    {
        $this->app->bind(AuthenticatableContract::class, function ($app) {
            return call_user_func($app['auth']->userResolver());
        });
    }
    protected function registerAccessGate()
    {
        $this->app->singleton(GateContract::class, function ($app) {
            return new Gate($app, function () use($app) {
                return call_user_func($app['auth']->userResolver());
            });
        });
    }
    protected function registerRequirePassword()
    {
        $this->app->bind(RequirePassword::class, function ($app) {
            return new RequirePassword($app[ResponseFactory::class], $app[UrlGenerator::class], $app['config']->get('auth.password_timeout'));
        });
    }
    protected function registerRequestRebindHandler()
    {
        $this->app->rebinding('request', function ($app, $request) {
            $request->setUserResolver(function ($guard = null) use($app) {
                return call_user_func($app['auth']->userResolver(), $guard);
            });
        });
    }
    protected function registerEventRebindHandler()
    {
        $this->app->rebinding('events', function ($app, $dispatcher) {
            if (!$app->resolved('auth') || $app['auth']->hasResolvedGuards() === false) {
                return;
            }
            if (method_exists($guard = $app['auth']->guard(), 'setDispatcher')) {
                $guard->setDispatcher($dispatcher);
            }
        });
    }
}
}

namespace Illuminate\Container {
use ArrayAccess;
use Closure;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Container\CircularDependencyException;
use Illuminate\Contracts\Container\Container as ContainerContract;
use LogicException;
use ReflectionClass;
use ReflectionException;
use ReflectionParameter;
use TypeError;
class Container implements ArrayAccess, ContainerContract
{
    protected static $instance;
    protected $resolved = [];
    protected $bindings = [];
    protected $methodBindings = [];
    protected $instances = [];
    protected $scopedInstances = [];
    protected $aliases = [];
    protected $abstractAliases = [];
    protected $extenders = [];
    protected $tags = [];
    protected $buildStack = [];
    protected $with = [];
    public $contextual = [];
    protected $reboundCallbacks = [];
    protected $globalBeforeResolvingCallbacks = [];
    protected $globalResolvingCallbacks = [];
    protected $globalAfterResolvingCallbacks = [];
    protected $beforeResolvingCallbacks = [];
    protected $resolvingCallbacks = [];
    protected $afterResolvingCallbacks = [];
    public function when($concrete)
    {
        $aliases = [];
        foreach (Util::arrayWrap($concrete) as $c) {
            $aliases[] = $this->getAlias($c);
        }
        return new ContextualBindingBuilder($this, $aliases);
    }
    public function bound($abstract)
    {
        return isset($this->bindings[$abstract]) || isset($this->instances[$abstract]) || $this->isAlias($abstract);
    }
    public function has($id)
    {
        return $this->bound($id);
    }
    public function resolved($abstract)
    {
        if ($this->isAlias($abstract)) {
            $abstract = $this->getAlias($abstract);
        }
        return isset($this->resolved[$abstract]) || isset($this->instances[$abstract]);
    }
    public function isShared($abstract)
    {
        return isset($this->instances[$abstract]) || isset($this->bindings[$abstract]['shared']) && $this->bindings[$abstract]['shared'] === true;
    }
    public function isAlias($name)
    {
        return isset($this->aliases[$name]);
    }
    public function bind($abstract, $concrete = null, $shared = false)
    {
        $this->dropStaleInstances($abstract);
        if (is_null($concrete)) {
            $concrete = $abstract;
        }
        if (!$concrete instanceof Closure) {
            if (!is_string($concrete)) {
                throw new TypeError(self::class . '::bind(): Argument #2 ($concrete) must be of type Closure|string|null');
            }
            $concrete = $this->getClosure($abstract, $concrete);
        }
        $this->bindings[$abstract] = compact('concrete', 'shared');
        if ($this->resolved($abstract)) {
            $this->rebound($abstract);
        }
    }
    protected function getClosure($abstract, $concrete)
    {
        return function ($container, $parameters = []) use($abstract, $concrete) {
            if ($abstract == $concrete) {
                return $container->build($concrete);
            }
            return $container->resolve($concrete, $parameters, $raiseEvents = false);
        };
    }
    public function hasMethodBinding($method)
    {
        return isset($this->methodBindings[$method]);
    }
    public function bindMethod($method, $callback)
    {
        $this->methodBindings[$this->parseBindMethod($method)] = $callback;
    }
    protected function parseBindMethod($method)
    {
        if (is_array($method)) {
            return $method[0] . '@' . $method[1];
        }
        return $method;
    }
    public function callMethodBinding($method, $instance)
    {
        return call_user_func($this->methodBindings[$method], $instance, $this);
    }
    public function addContextualBinding($concrete, $abstract, $implementation)
    {
        $this->contextual[$concrete][$this->getAlias($abstract)] = $implementation;
    }
    public function bindIf($abstract, $concrete = null, $shared = false)
    {
        if (!$this->bound($abstract)) {
            $this->bind($abstract, $concrete, $shared);
        }
    }
    public function singleton($abstract, $concrete = null)
    {
        $this->bind($abstract, $concrete, true);
    }
    public function singletonIf($abstract, $concrete = null)
    {
        if (!$this->bound($abstract)) {
            $this->singleton($abstract, $concrete);
        }
    }
    public function scoped($abstract, $concrete = null)
    {
        $this->scopedInstances[] = $abstract;
        $this->singleton($abstract, $concrete);
    }
    public function scopedIf($abstract, $concrete = null)
    {
        if (!$this->bound($abstract)) {
            $this->scopedInstances[] = $abstract;
            $this->singleton($abstract, $concrete);
        }
    }
    public function extend($abstract, Closure $closure)
    {
        $abstract = $this->getAlias($abstract);
        if (isset($this->instances[$abstract])) {
            $this->instances[$abstract] = $closure($this->instances[$abstract], $this);
            $this->rebound($abstract);
        } else {
            $this->extenders[$abstract][] = $closure;
            if ($this->resolved($abstract)) {
                $this->rebound($abstract);
            }
        }
    }
    public function instance($abstract, $instance)
    {
        $this->removeAbstractAlias($abstract);
        $isBound = $this->bound($abstract);
        unset($this->aliases[$abstract]);
        $this->instances[$abstract] = $instance;
        if ($isBound) {
            $this->rebound($abstract);
        }
        return $instance;
    }
    protected function removeAbstractAlias($searched)
    {
        if (!isset($this->aliases[$searched])) {
            return;
        }
        foreach ($this->abstractAliases as $abstract => $aliases) {
            foreach ($aliases as $index => $alias) {
                if ($alias == $searched) {
                    unset($this->abstractAliases[$abstract][$index]);
                }
            }
        }
    }
    public function tag($abstracts, $tags)
    {
        $tags = is_array($tags) ? $tags : array_slice(func_get_args(), 1);
        foreach ($tags as $tag) {
            if (!isset($this->tags[$tag])) {
                $this->tags[$tag] = [];
            }
            foreach ((array) $abstracts as $abstract) {
                $this->tags[$tag][] = $abstract;
            }
        }
    }
    public function tagged($tag)
    {
        if (!isset($this->tags[$tag])) {
            return [];
        }
        return new RewindableGenerator(function () use($tag) {
            foreach ($this->tags[$tag] as $abstract) {
                (yield $this->make($abstract));
            }
        }, count($this->tags[$tag]));
    }
    public function alias($abstract, $alias)
    {
        if ($alias === $abstract) {
            throw new LogicException("[{$abstract}] is aliased to itself.");
        }
        $this->aliases[$alias] = $abstract;
        $this->abstractAliases[$abstract][] = $alias;
    }
    public function rebinding($abstract, Closure $callback)
    {
        $this->reboundCallbacks[$abstract = $this->getAlias($abstract)][] = $callback;
        if ($this->bound($abstract)) {
            return $this->make($abstract);
        }
    }
    public function refresh($abstract, $target, $method)
    {
        return $this->rebinding($abstract, function ($app, $instance) use($target, $method) {
            $target->{$method}($instance);
        });
    }
    protected function rebound($abstract)
    {
        $instance = $this->make($abstract);
        foreach ($this->getReboundCallbacks($abstract) as $callback) {
            call_user_func($callback, $this, $instance);
        }
    }
    protected function getReboundCallbacks($abstract)
    {
        return $this->reboundCallbacks[$abstract] ?? [];
    }
    public function wrap(Closure $callback, array $parameters = [])
    {
        return function () use($callback, $parameters) {
            return $this->call($callback, $parameters);
        };
    }
    public function call($callback, array $parameters = [], $defaultMethod = null)
    {
        return BoundMethod::call($this, $callback, $parameters, $defaultMethod);
    }
    public function factory($abstract)
    {
        return function () use($abstract) {
            return $this->make($abstract);
        };
    }
    public function makeWith($abstract, array $parameters = [])
    {
        return $this->make($abstract, $parameters);
    }
    public function make($abstract, array $parameters = [])
    {
        return $this->resolve($abstract, $parameters);
    }
    public function get($id)
    {
        try {
            return $this->resolve($id);
        } catch (Exception $e) {
            if ($this->has($id) || $e instanceof CircularDependencyException) {
                throw $e;
            }
            throw new EntryNotFoundException($id, $e->getCode(), $e);
        }
    }
    protected function resolve($abstract, $parameters = [], $raiseEvents = true)
    {
        $abstract = $this->getAlias($abstract);
        if ($raiseEvents) {
            $this->fireBeforeResolvingCallbacks($abstract, $parameters);
        }
        $concrete = $this->getContextualConcrete($abstract);
        $needsContextualBuild = !empty($parameters) || !is_null($concrete);
        if (isset($this->instances[$abstract]) && !$needsContextualBuild) {
            return $this->instances[$abstract];
        }
        $this->with[] = $parameters;
        if (is_null($concrete)) {
            $concrete = $this->getConcrete($abstract);
        }
        if ($this->isBuildable($concrete, $abstract)) {
            $object = $this->build($concrete);
        } else {
            $object = $this->make($concrete);
        }
        foreach ($this->getExtenders($abstract) as $extender) {
            $object = $extender($object, $this);
        }
        if ($this->isShared($abstract) && !$needsContextualBuild) {
            $this->instances[$abstract] = $object;
        }
        if ($raiseEvents) {
            $this->fireResolvingCallbacks($abstract, $object);
        }
        $this->resolved[$abstract] = true;
        array_pop($this->with);
        return $object;
    }
    protected function getConcrete($abstract)
    {
        if (isset($this->bindings[$abstract])) {
            return $this->bindings[$abstract]['concrete'];
        }
        return $abstract;
    }
    protected function getContextualConcrete($abstract)
    {
        if (!is_null($binding = $this->findInContextualBindings($abstract))) {
            return $binding;
        }
        if (empty($this->abstractAliases[$abstract])) {
            return;
        }
        foreach ($this->abstractAliases[$abstract] as $alias) {
            if (!is_null($binding = $this->findInContextualBindings($alias))) {
                return $binding;
            }
        }
    }
    protected function findInContextualBindings($abstract)
    {
        return $this->contextual[end($this->buildStack)][$abstract] ?? null;
    }
    protected function isBuildable($concrete, $abstract)
    {
        return $concrete === $abstract || $concrete instanceof Closure;
    }
    public function build($concrete)
    {
        if ($concrete instanceof Closure) {
            return $concrete($this, $this->getLastParameterOverride());
        }
        try {
            $reflector = new ReflectionClass($concrete);
        } catch (ReflectionException $e) {
            throw new BindingResolutionException("Target class [{$concrete}] does not exist.", 0, $e);
        }
        if (!$reflector->isInstantiable()) {
            return $this->notInstantiable($concrete);
        }
        $this->buildStack[] = $concrete;
        $constructor = $reflector->getConstructor();
        if (is_null($constructor)) {
            array_pop($this->buildStack);
            return new $concrete();
        }
        $dependencies = $constructor->getParameters();
        try {
            $instances = $this->resolveDependencies($dependencies);
        } catch (BindingResolutionException $e) {
            array_pop($this->buildStack);
            throw $e;
        }
        array_pop($this->buildStack);
        return $reflector->newInstanceArgs($instances);
    }
    protected function resolveDependencies(array $dependencies)
    {
        $results = [];
        foreach ($dependencies as $dependency) {
            if ($this->hasParameterOverride($dependency)) {
                $results[] = $this->getParameterOverride($dependency);
                continue;
            }
            $result = is_null(Util::getParameterClassName($dependency)) ? $this->resolvePrimitive($dependency) : $this->resolveClass($dependency);
            if ($dependency->isVariadic()) {
                $results = array_merge($results, $result);
            } else {
                $results[] = $result;
            }
        }
        return $results;
    }
    protected function hasParameterOverride($dependency)
    {
        return array_key_exists($dependency->name, $this->getLastParameterOverride());
    }
    protected function getParameterOverride($dependency)
    {
        return $this->getLastParameterOverride()[$dependency->name];
    }
    protected function getLastParameterOverride()
    {
        return count($this->with) ? end($this->with) : [];
    }
    protected function resolvePrimitive(ReflectionParameter $parameter)
    {
        if (!is_null($concrete = $this->getContextualConcrete('$' . $parameter->getName()))) {
            return $concrete instanceof Closure ? $concrete($this) : $concrete;
        }
        if ($parameter->isDefaultValueAvailable()) {
            return $parameter->getDefaultValue();
        }
        $this->unresolvablePrimitive($parameter);
    }
    protected function resolveClass(ReflectionParameter $parameter)
    {
        try {
            return $parameter->isVariadic() ? $this->resolveVariadicClass($parameter) : $this->make(Util::getParameterClassName($parameter));
        } catch (BindingResolutionException $e) {
            if ($parameter->isDefaultValueAvailable()) {
                array_pop($this->with);
                return $parameter->getDefaultValue();
            }
            if ($parameter->isVariadic()) {
                array_pop($this->with);
                return [];
            }
            throw $e;
        }
    }
    protected function resolveVariadicClass(ReflectionParameter $parameter)
    {
        $className = Util::getParameterClassName($parameter);
        $abstract = $this->getAlias($className);
        if (!is_array($concrete = $this->getContextualConcrete($abstract))) {
            return $this->make($className);
        }
        return array_map(function ($abstract) {
            return $this->resolve($abstract);
        }, $concrete);
    }
    protected function notInstantiable($concrete)
    {
        if (!empty($this->buildStack)) {
            $previous = implode(', ', $this->buildStack);
            $message = "Target [{$concrete}] is not instantiable while building [{$previous}].";
        } else {
            $message = "Target [{$concrete}] is not instantiable.";
        }
        throw new BindingResolutionException($message);
    }
    protected function unresolvablePrimitive(ReflectionParameter $parameter)
    {
        $message = "Unresolvable dependency resolving [{$parameter}] in class {$parameter->getDeclaringClass()->getName()}";
        throw new BindingResolutionException($message);
    }
    public function beforeResolving($abstract, Closure $callback = null)
    {
        if (is_string($abstract)) {
            $abstract = $this->getAlias($abstract);
        }
        if ($abstract instanceof Closure && is_null($callback)) {
            $this->globalBeforeResolvingCallbacks[] = $abstract;
        } else {
            $this->beforeResolvingCallbacks[$abstract][] = $callback;
        }
    }
    public function resolving($abstract, Closure $callback = null)
    {
        if (is_string($abstract)) {
            $abstract = $this->getAlias($abstract);
        }
        if (is_null($callback) && $abstract instanceof Closure) {
            $this->globalResolvingCallbacks[] = $abstract;
        } else {
            $this->resolvingCallbacks[$abstract][] = $callback;
        }
    }
    public function afterResolving($abstract, Closure $callback = null)
    {
        if (is_string($abstract)) {
            $abstract = $this->getAlias($abstract);
        }
        if ($abstract instanceof Closure && is_null($callback)) {
            $this->globalAfterResolvingCallbacks[] = $abstract;
        } else {
            $this->afterResolvingCallbacks[$abstract][] = $callback;
        }
    }
    protected function fireBeforeResolvingCallbacks($abstract, $parameters = [])
    {
        $this->fireBeforeCallbackArray($abstract, $parameters, $this->globalBeforeResolvingCallbacks);
        foreach ($this->beforeResolvingCallbacks as $type => $callbacks) {
            if ($type === $abstract || is_subclass_of($abstract, $type)) {
                $this->fireBeforeCallbackArray($abstract, $parameters, $callbacks);
            }
        }
    }
    protected function fireBeforeCallbackArray($abstract, $parameters, array $callbacks)
    {
        foreach ($callbacks as $callback) {
            $callback($abstract, $parameters, $this);
        }
    }
    protected function fireResolvingCallbacks($abstract, $object)
    {
        $this->fireCallbackArray($object, $this->globalResolvingCallbacks);
        $this->fireCallbackArray($object, $this->getCallbacksForType($abstract, $object, $this->resolvingCallbacks));
        $this->fireAfterResolvingCallbacks($abstract, $object);
    }
    protected function fireAfterResolvingCallbacks($abstract, $object)
    {
        $this->fireCallbackArray($object, $this->globalAfterResolvingCallbacks);
        $this->fireCallbackArray($object, $this->getCallbacksForType($abstract, $object, $this->afterResolvingCallbacks));
    }
    protected function getCallbacksForType($abstract, $object, array $callbacksPerType)
    {
        $results = [];
        foreach ($callbacksPerType as $type => $callbacks) {
            if ($type === $abstract || $object instanceof $type) {
                $results = array_merge($results, $callbacks);
            }
        }
        return $results;
    }
    protected function fireCallbackArray($object, array $callbacks)
    {
        foreach ($callbacks as $callback) {
            $callback($object, $this);
        }
    }
    public function getBindings()
    {
        return $this->bindings;
    }
    public function getAlias($abstract)
    {
        return isset($this->aliases[$abstract]) ? $this->getAlias($this->aliases[$abstract]) : $abstract;
    }
    protected function getExtenders($abstract)
    {
        return $this->extenders[$this->getAlias($abstract)] ?? [];
    }
    public function forgetExtenders($abstract)
    {
        unset($this->extenders[$this->getAlias($abstract)]);
    }
    protected function dropStaleInstances($abstract)
    {
        unset($this->instances[$abstract], $this->aliases[$abstract]);
    }
    public function forgetInstance($abstract)
    {
        unset($this->instances[$abstract]);
    }
    public function forgetInstances()
    {
        $this->instances = [];
    }
    public function forgetScopedInstances()
    {
        foreach ($this->scopedInstances as $scoped) {
            unset($this->instances[$scoped]);
        }
    }
    public function flush()
    {
        $this->aliases = [];
        $this->resolved = [];
        $this->bindings = [];
        $this->instances = [];
        $this->abstractAliases = [];
        $this->scopedInstances = [];
    }
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }
    public static function setInstance(ContainerContract $container = null)
    {
        return static::$instance = $container;
    }
    public function offsetExists($key)
    {
        return $this->bound($key);
    }
    public function offsetGet($key)
    {
        return $this->make($key);
    }
    public function offsetSet($key, $value)
    {
        $this->bind($key, $value instanceof Closure ? $value : function () use($value) {
            return $value;
        });
    }
    public function offsetUnset($key)
    {
        unset($this->bindings[$key], $this->instances[$key], $this->resolved[$key]);
    }
    public function __get($key)
    {
        return $this[$key];
    }
    public function __set($key, $value)
    {
        $this[$key] = $value;
    }
}
}

namespace Symfony\Component\HttpKernel {
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
interface HttpKernelInterface
{
    public const MAIN_REQUEST = 1;
    public const SUB_REQUEST = 2;
    public const MASTER_REQUEST = self::MAIN_REQUEST;
    public function handle(Request $request, int $type = self::MAIN_REQUEST, bool $catch = true);
}
}

namespace Symfony\Component\HttpKernel {
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
interface TerminableInterface
{
    public function terminate(Request $request, Response $response);
}
}

namespace Illuminate\Http {
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\HeaderBag;
use Throwable;
trait ResponseTrait
{
    public $original;
    public $exception;
    public function status()
    {
        return $this->getStatusCode();
    }
    public function statusText()
    {
        return $this->statusText;
    }
    public function content()
    {
        return $this->getContent();
    }
    public function getOriginalContent()
    {
        $original = $this->original;
        return $original instanceof self ? $original->{__FUNCTION__}() : $original;
    }
    public function header($key, $values, $replace = true)
    {
        $this->headers->set($key, $values, $replace);
        return $this;
    }
    public function withHeaders($headers)
    {
        if ($headers instanceof HeaderBag) {
            $headers = $headers->all();
        }
        foreach ($headers as $key => $value) {
            $this->headers->set($key, $value);
        }
        return $this;
    }
    public function cookie($cookie)
    {
        return $this->withCookie(...func_get_args());
    }
    public function withCookie($cookie)
    {
        if (is_string($cookie) && function_exists('cookie')) {
            $cookie = cookie(...func_get_args());
        }
        $this->headers->setCookie($cookie);
        return $this;
    }
    public function withoutCookie($cookie, $path = null, $domain = null)
    {
        if (is_string($cookie) && function_exists('cookie')) {
            $cookie = cookie($cookie, null, -2628000, $path, $domain);
        }
        $this->headers->setCookie($cookie);
        return $this;
    }
    public function getCallback()
    {
        return $this->callback ?? null;
    }
    public function withException(Throwable $e)
    {
        $this->exception = $e;
        return $this;
    }
    public function throwResponse()
    {
        throw new HttpResponseException($this);
    }
}
}

namespace Illuminate\Http {
use ArrayObject;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Traits\Macroable;
use InvalidArgumentException;
use JsonSerializable;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
class Response extends SymfonyResponse
{
    use ResponseTrait, Macroable {
        Macroable::__call as macroCall;
    }
    public function __construct($content = '', $status = 200, array $headers = [])
    {
        $this->headers = new ResponseHeaderBag($headers);
        $this->setContent($content);
        $this->setStatusCode($status);
        $this->setProtocolVersion('1.0');
    }
    public function setContent($content)
    {
        $this->original = $content;
        if ($this->shouldBeJson($content)) {
            $this->header('Content-Type', 'application/json');
            $content = $this->morphToJson($content);
            if ($content === false) {
                throw new InvalidArgumentException(json_last_error_msg());
            }
        } elseif ($content instanceof Renderable) {
            $content = $content->render();
        }
        parent::setContent($content);
        return $this;
    }
    protected function shouldBeJson($content)
    {
        return $content instanceof Arrayable || $content instanceof Jsonable || $content instanceof ArrayObject || $content instanceof JsonSerializable || is_array($content);
    }
    protected function morphToJson($content)
    {
        if ($content instanceof Jsonable) {
            return $content->toJson();
        } elseif ($content instanceof Arrayable) {
            return json_encode($content->toArray());
        }
        return json_encode($content);
    }
}
}

namespace Illuminate\Http\Middleware {
use Closure;
class FrameGuard
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN', false);
        return $response;
    }
}
}

namespace Symfony\Component\HttpFoundation {
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
class ParameterBag implements \IteratorAggregate, \Countable
{
    protected $parameters;
    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }
    public function all()
    {
        $key = \func_num_args() > 0 ? func_get_arg(0) : null;
        if (null === $key) {
            return $this->parameters;
        }
        if (!\is_array($value = $this->parameters[$key] ?? [])) {
            throw new BadRequestException(sprintf('Unexpected value for parameter "%s": expecting "array", got "%s".', $key, get_debug_type($value)));
        }
        return $value;
    }
    public function keys()
    {
        return array_keys($this->parameters);
    }
    public function replace(array $parameters = [])
    {
        $this->parameters = $parameters;
    }
    public function add(array $parameters = [])
    {
        $this->parameters = array_replace($this->parameters, $parameters);
    }
    public function get(string $key, $default = null)
    {
        return \array_key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
    }
    public function set(string $key, $value)
    {
        $this->parameters[$key] = $value;
    }
    public function has(string $key)
    {
        return \array_key_exists($key, $this->parameters);
    }
    public function remove(string $key)
    {
        unset($this->parameters[$key]);
    }
    public function getAlpha(string $key, string $default = '')
    {
        return preg_replace('/[^[:alpha:]]/', '', $this->get($key, $default));
    }
    public function getAlnum(string $key, string $default = '')
    {
        return preg_replace('/[^[:alnum:]]/', '', $this->get($key, $default));
    }
    public function getDigits(string $key, string $default = '')
    {
        return str_replace(['-', '+'], '', $this->filter($key, $default, \FILTER_SANITIZE_NUMBER_INT));
    }
    public function getInt(string $key, int $default = 0)
    {
        return (int) $this->get($key, $default);
    }
    public function getBoolean(string $key, bool $default = false)
    {
        return $this->filter($key, $default, \FILTER_VALIDATE_BOOLEAN);
    }
    public function filter(string $key, $default = null, int $filter = \FILTER_DEFAULT, $options = [])
    {
        $value = $this->get($key, $default);
        if (!\is_array($options) && $options) {
            $options = ['flags' => $options];
        }
        if (\is_array($value) && !isset($options['flags'])) {
            $options['flags'] = \FILTER_REQUIRE_ARRAY;
        }
        if (\FILTER_CALLBACK & $filter && !($options['options'] ?? null) instanceof \Closure) {
            trigger_deprecation('symfony/http-foundation', '5.2', 'Not passing a Closure together with FILTER_CALLBACK to "%s()" is deprecated. Wrap your filter in a closure instead.', __METHOD__);
        }
        return filter_var($value, $filter, $options);
    }
    public function getIterator()
    {
        return new \ArrayIterator($this->parameters);
    }
    public function count()
    {
        return \count($this->parameters);
    }
}
}

namespace Symfony\Component\HttpFoundation {
use Symfony\Component\HttpFoundation\File\UploadedFile;
class FileBag extends ParameterBag
{
    private const FILE_KEYS = ['error', 'name', 'size', 'tmp_name', 'type'];
    public function __construct(array $parameters = [])
    {
        $this->replace($parameters);
    }
    public function replace(array $files = [])
    {
        $this->parameters = [];
        $this->add($files);
    }
    public function set(string $key, $value)
    {
        if (!\is_array($value) && !$value instanceof UploadedFile) {
            throw new \InvalidArgumentException('An uploaded file must be an array or an instance of UploadedFile.');
        }
        parent::set($key, $this->convertFileInformation($value));
    }
    public function add(array $files = [])
    {
        foreach ($files as $key => $file) {
            $this->set($key, $file);
        }
    }
    protected function convertFileInformation($file)
    {
        if ($file instanceof UploadedFile) {
            return $file;
        }
        $file = $this->fixPhpFilesArray($file);
        $keys = array_keys($file);
        sort($keys);
        if (self::FILE_KEYS == $keys) {
            if (\UPLOAD_ERR_NO_FILE == $file['error']) {
                $file = null;
            } else {
                $file = new UploadedFile($file['tmp_name'], $file['name'], $file['type'], $file['error'], false);
            }
        } else {
            $file = array_map(function ($v) {
                return $v instanceof UploadedFile || \is_array($v) ? $this->convertFileInformation($v) : $v;
            }, $file);
            if (array_keys($keys) === $keys) {
                $file = array_filter($file);
            }
        }
        return $file;
    }
    protected function fixPhpFilesArray(array $data)
    {
        unset($data['full_path']);
        $keys = array_keys($data);
        sort($keys);
        if (self::FILE_KEYS != $keys || !isset($data['name']) || !\is_array($data['name'])) {
            return $data;
        }
        $files = $data;
        foreach (self::FILE_KEYS as $k) {
            unset($files[$k]);
        }
        foreach ($data['name'] as $key => $name) {
            $files[$key] = $this->fixPhpFilesArray(['error' => $data['error'][$key], 'name' => $name, 'type' => $data['type'][$key], 'tmp_name' => $data['tmp_name'][$key], 'size' => $data['size'][$key]]);
        }
        return $files;
    }
}
}

namespace Symfony\Component\HttpFoundation {
class ServerBag extends ParameterBag
{
    public function getHeaders()
    {
        $headers = [];
        foreach ($this->parameters as $key => $value) {
            if (str_starts_with($key, 'HTTP_')) {
                $headers[substr($key, 5)] = $value;
            } elseif (\in_array($key, ['CONTENT_TYPE', 'CONTENT_LENGTH', 'CONTENT_MD5'], true)) {
                $headers[$key] = $value;
            }
        }
        if (isset($this->parameters['PHP_AUTH_USER'])) {
            $headers['PHP_AUTH_USER'] = $this->parameters['PHP_AUTH_USER'];
            $headers['PHP_AUTH_PW'] = $this->parameters['PHP_AUTH_PW'] ?? '';
        } else {
            $authorizationHeader = null;
            if (isset($this->parameters['HTTP_AUTHORIZATION'])) {
                $authorizationHeader = $this->parameters['HTTP_AUTHORIZATION'];
            } elseif (isset($this->parameters['REDIRECT_HTTP_AUTHORIZATION'])) {
                $authorizationHeader = $this->parameters['REDIRECT_HTTP_AUTHORIZATION'];
            }
            if (null !== $authorizationHeader) {
                if (0 === stripos($authorizationHeader, 'basic ')) {
                    $exploded = explode(':', base64_decode(substr($authorizationHeader, 6)), 2);
                    if (2 == \count($exploded)) {
                        [$headers['PHP_AUTH_USER'], $headers['PHP_AUTH_PW']] = $exploded;
                    }
                } elseif (empty($this->parameters['PHP_AUTH_DIGEST']) && 0 === stripos($authorizationHeader, 'digest ')) {
                    $headers['PHP_AUTH_DIGEST'] = $authorizationHeader;
                    $this->parameters['PHP_AUTH_DIGEST'] = $authorizationHeader;
                } elseif (0 === stripos($authorizationHeader, 'bearer ')) {
                    $headers['AUTHORIZATION'] = $authorizationHeader;
                }
            }
        }
        if (isset($headers['AUTHORIZATION'])) {
            return $headers;
        }
        if (isset($headers['PHP_AUTH_USER'])) {
            $headers['AUTHORIZATION'] = 'Basic ' . base64_encode($headers['PHP_AUTH_USER'] . ':' . ($headers['PHP_AUTH_PW'] ?? ''));
        } elseif (isset($headers['PHP_AUTH_DIGEST'])) {
            $headers['AUTHORIZATION'] = $headers['PHP_AUTH_DIGEST'];
        }
        return $headers;
    }
}
}

namespace Symfony\Component\HttpFoundation {
class HeaderBag implements \IteratorAggregate, \Countable
{
    protected const UPPER = '_ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    protected const LOWER = '-abcdefghijklmnopqrstuvwxyz';
    protected $headers = [];
    protected $cacheControl = [];
    public function __construct(array $headers = [])
    {
        foreach ($headers as $key => $values) {
            $this->set($key, $values);
        }
    }
    public function __toString()
    {
        if (!($headers = $this->all())) {
            return '';
        }
        ksort($headers);
        $max = max(array_map('strlen', array_keys($headers))) + 1;
        $content = '';
        foreach ($headers as $name => $values) {
            $name = ucwords($name, '-');
            foreach ($values as $value) {
                $content .= sprintf("%-{$max}s %s\r\n", $name . ':', $value);
            }
        }
        return $content;
    }
    public function all(string $key = null)
    {
        if (null !== $key) {
            return $this->headers[strtr($key, self::UPPER, self::LOWER)] ?? [];
        }
        return $this->headers;
    }
    public function keys()
    {
        return array_keys($this->all());
    }
    public function replace(array $headers = [])
    {
        $this->headers = [];
        $this->add($headers);
    }
    public function add(array $headers)
    {
        foreach ($headers as $key => $values) {
            $this->set($key, $values);
        }
    }
    public function get(string $key, string $default = null)
    {
        $headers = $this->all($key);
        if (!$headers) {
            return $default;
        }
        if (null === $headers[0]) {
            return null;
        }
        return (string) $headers[0];
    }
    public function set(string $key, $values, bool $replace = true)
    {
        $key = strtr($key, self::UPPER, self::LOWER);
        if (\is_array($values)) {
            $values = array_values($values);
            if (true === $replace || !isset($this->headers[$key])) {
                $this->headers[$key] = $values;
            } else {
                $this->headers[$key] = array_merge($this->headers[$key], $values);
            }
        } else {
            if (true === $replace || !isset($this->headers[$key])) {
                $this->headers[$key] = [$values];
            } else {
                $this->headers[$key][] = $values;
            }
        }
        if ('cache-control' === $key) {
            $this->cacheControl = $this->parseCacheControl(implode(', ', $this->headers[$key]));
        }
    }
    public function has(string $key)
    {
        return \array_key_exists(strtr($key, self::UPPER, self::LOWER), $this->all());
    }
    public function contains(string $key, string $value)
    {
        return \in_array($value, $this->all($key));
    }
    public function remove(string $key)
    {
        $key = strtr($key, self::UPPER, self::LOWER);
        unset($this->headers[$key]);
        if ('cache-control' === $key) {
            $this->cacheControl = [];
        }
    }
    public function getDate(string $key, \DateTime $default = null)
    {
        if (null === ($value = $this->get($key))) {
            return $default;
        }
        if (false === ($date = \DateTime::createFromFormat(\DATE_RFC2822, $value))) {
            throw new \RuntimeException(sprintf('The "%s" HTTP header is not parseable (%s).', $key, $value));
        }
        return $date;
    }
    public function addCacheControlDirective(string $key, $value = true)
    {
        $this->cacheControl[$key] = $value;
        $this->set('Cache-Control', $this->getCacheControlHeader());
    }
    public function hasCacheControlDirective(string $key)
    {
        return \array_key_exists($key, $this->cacheControl);
    }
    public function getCacheControlDirective(string $key)
    {
        return $this->cacheControl[$key] ?? null;
    }
    public function removeCacheControlDirective(string $key)
    {
        unset($this->cacheControl[$key]);
        $this->set('Cache-Control', $this->getCacheControlHeader());
    }
    public function getIterator()
    {
        return new \ArrayIterator($this->headers);
    }
    public function count()
    {
        return \count($this->headers);
    }
    protected function getCacheControlHeader()
    {
        ksort($this->cacheControl);
        return HeaderUtils::toString($this->cacheControl, ',');
    }
    protected function parseCacheControl(string $header)
    {
        $parts = HeaderUtils::split($header, ',=');
        return HeaderUtils::combine($parts);
    }
}
}

namespace Symfony\Component\HttpFoundation\Session {
use Symfony\Component\HttpFoundation\Session\Storage\MetadataBag;
interface SessionInterface
{
    public function start();
    public function getId();
    public function setId(string $id);
    public function getName();
    public function setName(string $name);
    public function invalidate(int $lifetime = null);
    public function migrate(bool $destroy = false, int $lifetime = null);
    public function save();
    public function has(string $name);
    public function get(string $name, $default = null);
    public function set(string $name, $value);
    public function all();
    public function replace(array $attributes);
    public function remove(string $name);
    public function clear();
    public function isStarted();
    public function registerBag(SessionBagInterface $bag);
    public function getBag(string $name);
    public function getMetadataBag();
}
}

namespace Symfony\Component\HttpFoundation\Session {
interface SessionBagInterface
{
    public function getName();
    public function initialize(array &$array);
    public function getStorageKey();
    public function clear();
}
}

namespace Symfony\Component\HttpFoundation\Session\Attribute {
use Symfony\Component\HttpFoundation\Session\SessionBagInterface;
interface AttributeBagInterface extends SessionBagInterface
{
    public function has(string $name);
    public function get(string $name, $default = null);
    public function set(string $name, $value);
    public function all();
    public function replace(array $attributes);
    public function remove(string $name);
}
}

namespace Symfony\Component\HttpFoundation\Session\Attribute {
class AttributeBag implements AttributeBagInterface, \IteratorAggregate, \Countable
{
    private $name = 'attributes';
    private $storageKey;
    protected $attributes = [];
    public function __construct(string $storageKey = '_sf2_attributes')
    {
        $this->storageKey = $storageKey;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function initialize(array &$attributes)
    {
        $this->attributes =& $attributes;
    }
    public function getStorageKey()
    {
        return $this->storageKey;
    }
    public function has(string $name)
    {
        return \array_key_exists($name, $this->attributes);
    }
    public function get(string $name, $default = null)
    {
        return \array_key_exists($name, $this->attributes) ? $this->attributes[$name] : $default;
    }
    public function set(string $name, $value)
    {
        $this->attributes[$name] = $value;
    }
    public function all()
    {
        return $this->attributes;
    }
    public function replace(array $attributes)
    {
        $this->attributes = [];
        foreach ($attributes as $key => $value) {
            $this->set($key, $value);
        }
    }
    public function remove(string $name)
    {
        $retval = null;
        if (\array_key_exists($name, $this->attributes)) {
            $retval = $this->attributes[$name];
            unset($this->attributes[$name]);
        }
        return $retval;
    }
    public function clear()
    {
        $return = $this->attributes;
        $this->attributes = [];
        return $return;
    }
    public function getIterator()
    {
        return new \ArrayIterator($this->attributes);
    }
    public function count()
    {
        return \count($this->attributes);
    }
}
}

namespace Symfony\Component\HttpFoundation\Session\Storage {
use Symfony\Component\HttpFoundation\Session\SessionBagInterface;
class MetadataBag implements SessionBagInterface
{
    public const CREATED = 'c';
    public const UPDATED = 'u';
    public const LIFETIME = 'l';
    private $name = '__metadata';
    private $storageKey;
    protected $meta = [self::CREATED => 0, self::UPDATED => 0, self::LIFETIME => 0];
    private $lastUsed;
    private $updateThreshold;
    public function __construct(string $storageKey = '_sf2_meta', int $updateThreshold = 0)
    {
        $this->storageKey = $storageKey;
        $this->updateThreshold = $updateThreshold;
    }
    public function initialize(array &$array)
    {
        $this->meta =& $array;
        if (isset($array[self::CREATED])) {
            $this->lastUsed = $this->meta[self::UPDATED];
            $timeStamp = time();
            if ($timeStamp - $array[self::UPDATED] >= $this->updateThreshold) {
                $this->meta[self::UPDATED] = $timeStamp;
            }
        } else {
            $this->stampCreated();
        }
    }
    public function getLifetime()
    {
        return $this->meta[self::LIFETIME];
    }
    public function stampNew(int $lifetime = null)
    {
        $this->stampCreated($lifetime);
    }
    public function getStorageKey()
    {
        return $this->storageKey;
    }
    public function getCreated()
    {
        return $this->meta[self::CREATED];
    }
    public function getLastUsed()
    {
        return $this->lastUsed;
    }
    public function clear()
    {
        return null;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }
    private function stampCreated(int $lifetime = null) : void
    {
        $timeStamp = time();
        $this->meta[self::CREATED] = $this->meta[self::UPDATED] = $this->lastUsed = $timeStamp;
        $this->meta[self::LIFETIME] = $lifetime ?? (int) ini_get('session.cookie_lifetime');
    }
}
}

namespace Symfony\Component\HttpFoundation {
class AcceptHeaderItem
{
    private $value;
    private $quality = 1.0;
    private $index = 0;
    private $attributes = [];
    public function __construct(string $value, array $attributes = [])
    {
        $this->value = $value;
        foreach ($attributes as $name => $value) {
            $this->setAttribute($name, $value);
        }
    }
    public static function fromString(?string $itemValue)
    {
        $parts = HeaderUtils::split($itemValue ?? '', ';=');
        $part = array_shift($parts);
        $attributes = HeaderUtils::combine($parts);
        return new self($part[0], $attributes);
    }
    public function __toString()
    {
        $string = $this->value . ($this->quality < 1 ? ';q=' . $this->quality : '');
        if (\count($this->attributes) > 0) {
            $string .= '; ' . HeaderUtils::toString($this->attributes, ';');
        }
        return $string;
    }
    public function setValue(string $value)
    {
        $this->value = $value;
        return $this;
    }
    public function getValue()
    {
        return $this->value;
    }
    public function setQuality(float $quality)
    {
        $this->quality = $quality;
        return $this;
    }
    public function getQuality()
    {
        return $this->quality;
    }
    public function setIndex(int $index)
    {
        $this->index = $index;
        return $this;
    }
    public function getIndex()
    {
        return $this->index;
    }
    public function hasAttribute(string $name)
    {
        return isset($this->attributes[$name]);
    }
    public function getAttribute(string $name, $default = null)
    {
        return $this->attributes[$name] ?? $default;
    }
    public function getAttributes()
    {
        return $this->attributes;
    }
    public function setAttribute(string $name, string $value)
    {
        if ('q' === $name) {
            $this->quality = (float) $value;
        } else {
            $this->attributes[$name] = $value;
        }
        return $this;
    }
}
}

namespace Symfony\Component\HttpFoundation {
class_exists(AcceptHeaderItem::class);
class AcceptHeader
{
    private $items = [];
    private $sorted = true;
    public function __construct(array $items)
    {
        foreach ($items as $item) {
            $this->add($item);
        }
    }
    public static function fromString(?string $headerValue)
    {
        $index = 0;
        $parts = HeaderUtils::split($headerValue ?? '', ',;=');
        return new self(array_map(function ($subParts) use(&$index) {
            $part = array_shift($subParts);
            $attributes = HeaderUtils::combine($subParts);
            $item = new AcceptHeaderItem($part[0], $attributes);
            $item->setIndex($index++);
            return $item;
        }, $parts));
    }
    public function __toString()
    {
        return implode(',', $this->items);
    }
    public function has(string $value)
    {
        return isset($this->items[$value]);
    }
    public function get(string $value)
    {
        return $this->items[$value] ?? $this->items[explode('/', $value)[0] . '/*'] ?? $this->items['*/*'] ?? $this->items['*'] ?? null;
    }
    public function add(AcceptHeaderItem $item)
    {
        $this->items[$item->getValue()] = $item;
        $this->sorted = false;
        return $this;
    }
    public function all()
    {
        $this->sort();
        return $this->items;
    }
    public function filter(string $pattern)
    {
        return new self(array_filter($this->items, function (AcceptHeaderItem $item) use($pattern) {
            return preg_match($pattern, $item->getValue());
        }));
    }
    public function first()
    {
        $this->sort();
        return !empty($this->items) ? reset($this->items) : null;
    }
    private function sort() : void
    {
        if (!$this->sorted) {
            uasort($this->items, function (AcceptHeaderItem $a, AcceptHeaderItem $b) {
                $qA = $a->getQuality();
                $qB = $b->getQuality();
                if ($qA === $qB) {
                    return $a->getIndex() > $b->getIndex() ? 1 : -1;
                }
                return $qA > $qB ? -1 : 1;
            });
            $this->sorted = true;
        }
    }
}
}

namespace Symfony\Component\HttpFoundation {
class_exists(ResponseHeaderBag::class);
class Response
{
    public const HTTP_CONTINUE = 100;
    public const HTTP_SWITCHING_PROTOCOLS = 101;
    public const HTTP_PROCESSING = 102;
    public const HTTP_EARLY_HINTS = 103;
    public const HTTP_OK = 200;
    public const HTTP_CREATED = 201;
    public const HTTP_ACCEPTED = 202;
    public const HTTP_NON_AUTHORITATIVE_INFORMATION = 203;
    public const HTTP_NO_CONTENT = 204;
    public const HTTP_RESET_CONTENT = 205;
    public const HTTP_PARTIAL_CONTENT = 206;
    public const HTTP_MULTI_STATUS = 207;
    public const HTTP_ALREADY_REPORTED = 208;
    public const HTTP_IM_USED = 226;
    public const HTTP_MULTIPLE_CHOICES = 300;
    public const HTTP_MOVED_PERMANENTLY = 301;
    public const HTTP_FOUND = 302;
    public const HTTP_SEE_OTHER = 303;
    public const HTTP_NOT_MODIFIED = 304;
    public const HTTP_USE_PROXY = 305;
    public const HTTP_RESERVED = 306;
    public const HTTP_TEMPORARY_REDIRECT = 307;
    public const HTTP_PERMANENTLY_REDIRECT = 308;
    public const HTTP_BAD_REQUEST = 400;
    public const HTTP_UNAUTHORIZED = 401;
    public const HTTP_PAYMENT_REQUIRED = 402;
    public const HTTP_FORBIDDEN = 403;
    public const HTTP_NOT_FOUND = 404;
    public const HTTP_METHOD_NOT_ALLOWED = 405;
    public const HTTP_NOT_ACCEPTABLE = 406;
    public const HTTP_PROXY_AUTHENTICATION_REQUIRED = 407;
    public const HTTP_REQUEST_TIMEOUT = 408;
    public const HTTP_CONFLICT = 409;
    public const HTTP_GONE = 410;
    public const HTTP_LENGTH_REQUIRED = 411;
    public const HTTP_PRECONDITION_FAILED = 412;
    public const HTTP_REQUEST_ENTITY_TOO_LARGE = 413;
    public const HTTP_REQUEST_URI_TOO_LONG = 414;
    public const HTTP_UNSUPPORTED_MEDIA_TYPE = 415;
    public const HTTP_REQUESTED_RANGE_NOT_SATISFIABLE = 416;
    public const HTTP_EXPECTATION_FAILED = 417;
    public const HTTP_I_AM_A_TEAPOT = 418;
    public const HTTP_MISDIRECTED_REQUEST = 421;
    public const HTTP_UNPROCESSABLE_ENTITY = 422;
    public const HTTP_LOCKED = 423;
    public const HTTP_FAILED_DEPENDENCY = 424;
    public const HTTP_TOO_EARLY = 425;
    public const HTTP_UPGRADE_REQUIRED = 426;
    public const HTTP_PRECONDITION_REQUIRED = 428;
    public const HTTP_TOO_MANY_REQUESTS = 429;
    public const HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
    public const HTTP_UNAVAILABLE_FOR_LEGAL_REASONS = 451;
    public const HTTP_INTERNAL_SERVER_ERROR = 500;
    public const HTTP_NOT_IMPLEMENTED = 501;
    public const HTTP_BAD_GATEWAY = 502;
    public const HTTP_SERVICE_UNAVAILABLE = 503;
    public const HTTP_GATEWAY_TIMEOUT = 504;
    public const HTTP_VERSION_NOT_SUPPORTED = 505;
    public const HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL = 506;
    public const HTTP_INSUFFICIENT_STORAGE = 507;
    public const HTTP_LOOP_DETECTED = 508;
    public const HTTP_NOT_EXTENDED = 510;
    public const HTTP_NETWORK_AUTHENTICATION_REQUIRED = 511;
    private const HTTP_RESPONSE_CACHE_CONTROL_DIRECTIVES = ['must_revalidate' => false, 'no_cache' => false, 'no_store' => false, 'no_transform' => false, 'public' => false, 'private' => false, 'proxy_revalidate' => false, 'max_age' => true, 's_maxage' => true, 'immutable' => false, 'last_modified' => true, 'etag' => true];
    public $headers;
    protected $content;
    protected $version;
    protected $statusCode;
    protected $statusText;
    protected $charset;
    public static $statusTexts = [100 => 'Continue', 101 => 'Switching Protocols', 102 => 'Processing', 103 => 'Early Hints', 200 => 'OK', 201 => 'Created', 202 => 'Accepted', 203 => 'Non-Authoritative Information', 204 => 'No Content', 205 => 'Reset Content', 206 => 'Partial Content', 207 => 'Multi-Status', 208 => 'Already Reported', 226 => 'IM Used', 300 => 'Multiple Choices', 301 => 'Moved Permanently', 302 => 'Found', 303 => 'See Other', 304 => 'Not Modified', 305 => 'Use Proxy', 307 => 'Temporary Redirect', 308 => 'Permanent Redirect', 400 => 'Bad Request', 401 => 'Unauthorized', 402 => 'Payment Required', 403 => 'Forbidden', 404 => 'Not Found', 405 => 'Method Not Allowed', 406 => 'Not Acceptable', 407 => 'Proxy Authentication Required', 408 => 'Request Timeout', 409 => 'Conflict', 410 => 'Gone', 411 => 'Length Required', 412 => 'Precondition Failed', 413 => 'Content Too Large', 414 => 'URI Too Long', 415 => 'Unsupported Media Type', 416 => 'Range Not Satisfiable', 417 => 'Expectation Failed', 418 => 'I\'m a teapot', 421 => 'Misdirected Request', 422 => 'Unprocessable Content', 423 => 'Locked', 424 => 'Failed Dependency', 425 => 'Too Early', 426 => 'Upgrade Required', 428 => 'Precondition Required', 429 => 'Too Many Requests', 431 => 'Request Header Fields Too Large', 451 => 'Unavailable For Legal Reasons', 500 => 'Internal Server Error', 501 => 'Not Implemented', 502 => 'Bad Gateway', 503 => 'Service Unavailable', 504 => 'Gateway Timeout', 505 => 'HTTP Version Not Supported', 506 => 'Variant Also Negotiates', 507 => 'Insufficient Storage', 508 => 'Loop Detected', 510 => 'Not Extended', 511 => 'Network Authentication Required'];
    public function __construct(?string $content = '', int $status = 200, array $headers = [])
    {
        $this->headers = new ResponseHeaderBag($headers);
        $this->setContent($content);
        $this->setStatusCode($status);
        $this->setProtocolVersion('1.0');
    }
    public static function create(?string $content = '', int $status = 200, array $headers = [])
    {
        trigger_deprecation('symfony/http-foundation', '5.1', 'The "%s()" method is deprecated, use "new %s()" instead.', __METHOD__, static::class);
        return new static($content, $status, $headers);
    }
    public function __toString()
    {
        return sprintf('HTTP/%s %s %s', $this->version, $this->statusCode, $this->statusText) . "\r\n" . $this->headers . "\r\n" . $this->getContent();
    }
    public function __clone()
    {
        $this->headers = clone $this->headers;
    }
    public function prepare(Request $request)
    {
        $headers = $this->headers;
        if ($this->isInformational() || $this->isEmpty()) {
            $this->setContent(null);
            $headers->remove('Content-Type');
            $headers->remove('Content-Length');
            ini_set('default_mimetype', '');
        } else {
            if (!$headers->has('Content-Type')) {
                $format = $request->getRequestFormat(null);
                if (null !== $format && ($mimeType = $request->getMimeType($format))) {
                    $headers->set('Content-Type', $mimeType);
                }
            }
            $charset = $this->charset ?: 'UTF-8';
            if (!$headers->has('Content-Type')) {
                $headers->set('Content-Type', 'text/html; charset=' . $charset);
            } elseif (0 === stripos($headers->get('Content-Type'), 'text/') && false === stripos($headers->get('Content-Type'), 'charset')) {
                $headers->set('Content-Type', $headers->get('Content-Type') . '; charset=' . $charset);
            }
            if ($headers->has('Transfer-Encoding')) {
                $headers->remove('Content-Length');
            }
            if ($request->isMethod('HEAD')) {
                $length = $headers->get('Content-Length');
                $this->setContent(null);
                if ($length) {
                    $headers->set('Content-Length', $length);
                }
            }
        }
        if ('HTTP/1.0' != $request->server->get('SERVER_PROTOCOL')) {
            $this->setProtocolVersion('1.1');
        }
        if ('1.0' == $this->getProtocolVersion() && str_contains($headers->get('Cache-Control', ''), 'no-cache')) {
            $headers->set('pragma', 'no-cache');
            $headers->set('expires', -1);
        }
        $this->ensureIEOverSSLCompatibility($request);
        if ($request->isSecure()) {
            foreach ($headers->getCookies() as $cookie) {
                $cookie->setSecureDefault(true);
            }
        }
        return $this;
    }
    public function sendHeaders()
    {
        if (headers_sent()) {
            return $this;
        }
        foreach ($this->headers->allPreserveCaseWithoutCookies() as $name => $values) {
            $replace = 0 === strcasecmp($name, 'Content-Type');
            foreach ($values as $value) {
                header($name . ': ' . $value, $replace, $this->statusCode);
            }
        }
        foreach ($this->headers->getCookies() as $cookie) {
            header('Set-Cookie: ' . $cookie, false, $this->statusCode);
        }
        header(sprintf('HTTP/%s %s %s', $this->version, $this->statusCode, $this->statusText), true, $this->statusCode);
        return $this;
    }
    public function sendContent()
    {
        echo $this->content;
        return $this;
    }
    public function send()
    {
        $this->sendHeaders();
        $this->sendContent();
        if (\function_exists('fastcgi_finish_request')) {
            fastcgi_finish_request();
        } elseif (\function_exists('litespeed_finish_request')) {
            litespeed_finish_request();
        } elseif (!\in_array(\PHP_SAPI, ['cli', 'phpdbg'], true)) {
            static::closeOutputBuffers(0, true);
        }
        return $this;
    }
    public function setContent(?string $content)
    {
        $this->content = $content ?? '';
        return $this;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function setProtocolVersion(string $version) : object
    {
        $this->version = $version;
        return $this;
    }
    public function getProtocolVersion() : string
    {
        return $this->version;
    }
    public function setStatusCode(int $code, string $text = null) : object
    {
        $this->statusCode = $code;
        if ($this->isInvalid()) {
            throw new \InvalidArgumentException(sprintf('The HTTP status code "%s" is not valid.', $code));
        }
        if (null === $text) {
            $this->statusText = self::$statusTexts[$code] ?? 'unknown status';
            return $this;
        }
        if (false === $text) {
            $this->statusText = '';
            return $this;
        }
        $this->statusText = $text;
        return $this;
    }
    public function getStatusCode() : int
    {
        return $this->statusCode;
    }
    public function setCharset(string $charset) : object
    {
        $this->charset = $charset;
        return $this;
    }
    public function getCharset() : ?string
    {
        return $this->charset;
    }
    public function isCacheable() : bool
    {
        if (!\in_array($this->statusCode, [200, 203, 300, 301, 302, 404, 410])) {
            return false;
        }
        if ($this->headers->hasCacheControlDirective('no-store') || $this->headers->getCacheControlDirective('private')) {
            return false;
        }
        return $this->isValidateable() || $this->isFresh();
    }
    public function isFresh() : bool
    {
        return $this->getTtl() > 0;
    }
    public function isValidateable() : bool
    {
        return $this->headers->has('Last-Modified') || $this->headers->has('ETag');
    }
    public function setPrivate() : object
    {
        $this->headers->removeCacheControlDirective('public');
        $this->headers->addCacheControlDirective('private');
        return $this;
    }
    public function setPublic() : object
    {
        $this->headers->addCacheControlDirective('public');
        $this->headers->removeCacheControlDirective('private');
        return $this;
    }
    public function setImmutable(bool $immutable = true) : object
    {
        if ($immutable) {
            $this->headers->addCacheControlDirective('immutable');
        } else {
            $this->headers->removeCacheControlDirective('immutable');
        }
        return $this;
    }
    public function isImmutable() : bool
    {
        return $this->headers->hasCacheControlDirective('immutable');
    }
    public function mustRevalidate() : bool
    {
        return $this->headers->hasCacheControlDirective('must-revalidate') || $this->headers->hasCacheControlDirective('proxy-revalidate');
    }
    public function getDate() : ?\DateTimeInterface
    {
        return $this->headers->getDate('Date');
    }
    public function setDate(\DateTimeInterface $date) : object
    {
        if ($date instanceof \DateTime) {
            $date = \DateTimeImmutable::createFromMutable($date);
        }
        $date = $date->setTimezone(new \DateTimeZone('UTC'));
        $this->headers->set('Date', $date->format('D, d M Y H:i:s') . ' GMT');
        return $this;
    }
    public function getAge() : int
    {
        if (null !== ($age = $this->headers->get('Age'))) {
            return (int) $age;
        }
        return max(time() - (int) $this->getDate()->format('U'), 0);
    }
    public function expire()
    {
        if ($this->isFresh()) {
            $this->headers->set('Age', $this->getMaxAge());
            $this->headers->remove('Expires');
        }
        return $this;
    }
    public function getExpires() : ?\DateTimeInterface
    {
        try {
            return $this->headers->getDate('Expires');
        } catch (\RuntimeException $e) {
            return \DateTime::createFromFormat('U', time() - 172800);
        }
    }
    public function setExpires(\DateTimeInterface $date = null) : object
    {
        if (null === $date) {
            $this->headers->remove('Expires');
            return $this;
        }
        if ($date instanceof \DateTime) {
            $date = \DateTimeImmutable::createFromMutable($date);
        }
        $date = $date->setTimezone(new \DateTimeZone('UTC'));
        $this->headers->set('Expires', $date->format('D, d M Y H:i:s') . ' GMT');
        return $this;
    }
    public function getMaxAge() : ?int
    {
        if ($this->headers->hasCacheControlDirective('s-maxage')) {
            return (int) $this->headers->getCacheControlDirective('s-maxage');
        }
        if ($this->headers->hasCacheControlDirective('max-age')) {
            return (int) $this->headers->getCacheControlDirective('max-age');
        }
        if (null !== $this->getExpires()) {
            return (int) $this->getExpires()->format('U') - (int) $this->getDate()->format('U');
        }
        return null;
    }
    public function setMaxAge(int $value) : object
    {
        $this->headers->addCacheControlDirective('max-age', $value);
        return $this;
    }
    public function setSharedMaxAge(int $value) : object
    {
        $this->setPublic();
        $this->headers->addCacheControlDirective('s-maxage', $value);
        return $this;
    }
    public function getTtl() : ?int
    {
        $maxAge = $this->getMaxAge();
        return null !== $maxAge ? $maxAge - $this->getAge() : null;
    }
    public function setTtl(int $seconds) : object
    {
        $this->setSharedMaxAge($this->getAge() + $seconds);
        return $this;
    }
    public function setClientTtl(int $seconds) : object
    {
        $this->setMaxAge($this->getAge() + $seconds);
        return $this;
    }
    public function getLastModified() : ?\DateTimeInterface
    {
        return $this->headers->getDate('Last-Modified');
    }
    public function setLastModified(\DateTimeInterface $date = null) : object
    {
        if (null === $date) {
            $this->headers->remove('Last-Modified');
            return $this;
        }
        if ($date instanceof \DateTime) {
            $date = \DateTimeImmutable::createFromMutable($date);
        }
        $date = $date->setTimezone(new \DateTimeZone('UTC'));
        $this->headers->set('Last-Modified', $date->format('D, d M Y H:i:s') . ' GMT');
        return $this;
    }
    public function getEtag() : ?string
    {
        return $this->headers->get('ETag');
    }
    public function setEtag(string $etag = null, bool $weak = false) : object
    {
        if (null === $etag) {
            $this->headers->remove('Etag');
        } else {
            if (!str_starts_with($etag, '"')) {
                $etag = '"' . $etag . '"';
            }
            $this->headers->set('ETag', (true === $weak ? 'W/' : '') . $etag);
        }
        return $this;
    }
    public function setCache(array $options) : object
    {
        if ($diff = array_diff(array_keys($options), array_keys(self::HTTP_RESPONSE_CACHE_CONTROL_DIRECTIVES))) {
            throw new \InvalidArgumentException(sprintf('Response does not support the following options: "%s".', implode('", "', $diff)));
        }
        if (isset($options['etag'])) {
            $this->setEtag($options['etag']);
        }
        if (isset($options['last_modified'])) {
            $this->setLastModified($options['last_modified']);
        }
        if (isset($options['max_age'])) {
            $this->setMaxAge($options['max_age']);
        }
        if (isset($options['s_maxage'])) {
            $this->setSharedMaxAge($options['s_maxage']);
        }
        foreach (self::HTTP_RESPONSE_CACHE_CONTROL_DIRECTIVES as $directive => $hasValue) {
            if (!$hasValue && isset($options[$directive])) {
                if ($options[$directive]) {
                    $this->headers->addCacheControlDirective(str_replace('_', '-', $directive));
                } else {
                    $this->headers->removeCacheControlDirective(str_replace('_', '-', $directive));
                }
            }
        }
        if (isset($options['public'])) {
            if ($options['public']) {
                $this->setPublic();
            } else {
                $this->setPrivate();
            }
        }
        if (isset($options['private'])) {
            if ($options['private']) {
                $this->setPrivate();
            } else {
                $this->setPublic();
            }
        }
        return $this;
    }
    public function setNotModified() : object
    {
        $this->setStatusCode(304);
        $this->setContent(null);
        foreach (['Allow', 'Content-Encoding', 'Content-Language', 'Content-Length', 'Content-MD5', 'Content-Type', 'Last-Modified'] as $header) {
            $this->headers->remove($header);
        }
        return $this;
    }
    public function hasVary() : bool
    {
        return null !== $this->headers->get('Vary');
    }
    public function getVary() : array
    {
        if (!($vary = $this->headers->all('Vary'))) {
            return [];
        }
        $ret = [];
        foreach ($vary as $item) {
            $ret[] = preg_split('/[\\s,]+/', $item);
        }
        return array_merge([], ...$ret);
    }
    public function setVary($headers, bool $replace = true) : object
    {
        $this->headers->set('Vary', $headers, $replace);
        return $this;
    }
    public function isNotModified(Request $request) : bool
    {
        if (!$request->isMethodCacheable()) {
            return false;
        }
        $notModified = false;
        $lastModified = $this->headers->get('Last-Modified');
        $modifiedSince = $request->headers->get('If-Modified-Since');
        if (($ifNoneMatchEtags = $request->getETags()) && null !== ($etag = $this->getEtag())) {
            if (0 == strncmp($etag, 'W/', 2)) {
                $etag = substr($etag, 2);
            }
            foreach ($ifNoneMatchEtags as $ifNoneMatchEtag) {
                if (0 == strncmp($ifNoneMatchEtag, 'W/', 2)) {
                    $ifNoneMatchEtag = substr($ifNoneMatchEtag, 2);
                }
                if ($ifNoneMatchEtag === $etag || '*' === $ifNoneMatchEtag) {
                    $notModified = true;
                    break;
                }
            }
        } elseif ($modifiedSince && $lastModified) {
            $notModified = strtotime($modifiedSince) >= strtotime($lastModified);
        }
        if ($notModified) {
            $this->setNotModified();
        }
        return $notModified;
    }
    public function isInvalid() : bool
    {
        return $this->statusCode < 100 || $this->statusCode >= 600;
    }
    public function isInformational() : bool
    {
        return $this->statusCode >= 100 && $this->statusCode < 200;
    }
    public function isSuccessful() : bool
    {
        return $this->statusCode >= 200 && $this->statusCode < 300;
    }
    public function isRedirection() : bool
    {
        return $this->statusCode >= 300 && $this->statusCode < 400;
    }
    public function isClientError() : bool
    {
        return $this->statusCode >= 400 && $this->statusCode < 500;
    }
    public function isServerError() : bool
    {
        return $this->statusCode >= 500 && $this->statusCode < 600;
    }
    public function isOk() : bool
    {
        return 200 === $this->statusCode;
    }
    public function isForbidden() : bool
    {
        return 403 === $this->statusCode;
    }
    public function isNotFound() : bool
    {
        return 404 === $this->statusCode;
    }
    public function isRedirect(string $location = null) : bool
    {
        return \in_array($this->statusCode, [201, 301, 302, 303, 307, 308]) && (null === $location ?: $location == $this->headers->get('Location'));
    }
    public function isEmpty() : bool
    {
        return \in_array($this->statusCode, [204, 304]);
    }
    public static function closeOutputBuffers(int $targetLevel, bool $flush) : void
    {
        $status = ob_get_status(true);
        $level = \count($status);
        $flags = \PHP_OUTPUT_HANDLER_REMOVABLE | ($flush ? \PHP_OUTPUT_HANDLER_FLUSHABLE : \PHP_OUTPUT_HANDLER_CLEANABLE);
        while ($level-- > $targetLevel && ($s = $status[$level]) && (!isset($s['del']) ? !isset($s['flags']) || ($s['flags'] & $flags) === $flags : $s['del'])) {
            if ($flush) {
                ob_end_flush();
            } else {
                ob_end_clean();
            }
        }
    }
    public function setContentSafe(bool $safe = true) : void
    {
        if ($safe) {
            $this->headers->set('Preference-Applied', 'safe');
        } elseif ('safe' === $this->headers->get('Preference-Applied')) {
            $this->headers->remove('Preference-Applied');
        }
        $this->setVary('Prefer', false);
    }
    protected function ensureIEOverSSLCompatibility(Request $request) : void
    {
        if (false !== stripos($this->headers->get('Content-Disposition') ?? '', 'attachment') && 1 == preg_match('/MSIE (.*?);/i', $request->server->get('HTTP_USER_AGENT') ?? '', $match) && true === $request->isSecure()) {
            if ((int) preg_replace('/(MSIE )(.*?);/', '$2', $match[0]) < 9) {
                $this->headers->remove('Cache-Control');
            }
        }
    }
}
}

namespace Symfony\Component\HttpFoundation {
class ResponseHeaderBag extends HeaderBag
{
    public const COOKIES_FLAT = 'flat';
    public const COOKIES_ARRAY = 'array';
    public const DISPOSITION_ATTACHMENT = 'attachment';
    public const DISPOSITION_INLINE = 'inline';
    protected $computedCacheControl = [];
    protected $cookies = [];
    protected $headerNames = [];
    public function __construct(array $headers = [])
    {
        parent::__construct($headers);
        if (!isset($this->headers['cache-control'])) {
            $this->set('Cache-Control', '');
        }
        if (!isset($this->headers['date'])) {
            $this->initDate();
        }
    }
    public function allPreserveCase()
    {
        $headers = [];
        foreach ($this->all() as $name => $value) {
            $headers[$this->headerNames[$name] ?? $name] = $value;
        }
        return $headers;
    }
    public function allPreserveCaseWithoutCookies()
    {
        $headers = $this->allPreserveCase();
        if (isset($this->headerNames['set-cookie'])) {
            unset($headers[$this->headerNames['set-cookie']]);
        }
        return $headers;
    }
    public function replace(array $headers = [])
    {
        $this->headerNames = [];
        parent::replace($headers);
        if (!isset($this->headers['cache-control'])) {
            $this->set('Cache-Control', '');
        }
        if (!isset($this->headers['date'])) {
            $this->initDate();
        }
    }
    public function all(string $key = null)
    {
        $headers = parent::all();
        if (null !== $key) {
            $key = strtr($key, self::UPPER, self::LOWER);
            return 'set-cookie' !== $key ? $headers[$key] ?? [] : array_map('strval', $this->getCookies());
        }
        foreach ($this->getCookies() as $cookie) {
            $headers['set-cookie'][] = (string) $cookie;
        }
        return $headers;
    }
    public function set(string $key, $values, bool $replace = true)
    {
        $uniqueKey = strtr($key, self::UPPER, self::LOWER);
        if ('set-cookie' === $uniqueKey) {
            if ($replace) {
                $this->cookies = [];
            }
            foreach ((array) $values as $cookie) {
                $this->setCookie(Cookie::fromString($cookie));
            }
            $this->headerNames[$uniqueKey] = $key;
            return;
        }
        $this->headerNames[$uniqueKey] = $key;
        parent::set($key, $values, $replace);
        if (\in_array($uniqueKey, ['cache-control', 'etag', 'last-modified', 'expires'], true) && '' !== ($computed = $this->computeCacheControlValue())) {
            $this->headers['cache-control'] = [$computed];
            $this->headerNames['cache-control'] = 'Cache-Control';
            $this->computedCacheControl = $this->parseCacheControl($computed);
        }
    }
    public function remove(string $key)
    {
        $uniqueKey = strtr($key, self::UPPER, self::LOWER);
        unset($this->headerNames[$uniqueKey]);
        if ('set-cookie' === $uniqueKey) {
            $this->cookies = [];
            return;
        }
        parent::remove($key);
        if ('cache-control' === $uniqueKey) {
            $this->computedCacheControl = [];
        }
        if ('date' === $uniqueKey) {
            $this->initDate();
        }
    }
    public function hasCacheControlDirective(string $key)
    {
        return \array_key_exists($key, $this->computedCacheControl);
    }
    public function getCacheControlDirective(string $key)
    {
        return $this->computedCacheControl[$key] ?? null;
    }
    public function setCookie(Cookie $cookie)
    {
        $this->cookies[$cookie->getDomain()][$cookie->getPath()][$cookie->getName()] = $cookie;
        $this->headerNames['set-cookie'] = 'Set-Cookie';
    }
    public function removeCookie(string $name, ?string $path = '/', string $domain = null)
    {
        if (null === $path) {
            $path = '/';
        }
        unset($this->cookies[$domain][$path][$name]);
        if (empty($this->cookies[$domain][$path])) {
            unset($this->cookies[$domain][$path]);
            if (empty($this->cookies[$domain])) {
                unset($this->cookies[$domain]);
            }
        }
        if (empty($this->cookies)) {
            unset($this->headerNames['set-cookie']);
        }
    }
    public function getCookies(string $format = self::COOKIES_FLAT)
    {
        if (!\in_array($format, [self::COOKIES_FLAT, self::COOKIES_ARRAY])) {
            throw new \InvalidArgumentException(sprintf('Format "%s" invalid (%s).', $format, implode(', ', [self::COOKIES_FLAT, self::COOKIES_ARRAY])));
        }
        if (self::COOKIES_ARRAY === $format) {
            return $this->cookies;
        }
        $flattenedCookies = [];
        foreach ($this->cookies as $path) {
            foreach ($path as $cookies) {
                foreach ($cookies as $cookie) {
                    $flattenedCookies[] = $cookie;
                }
            }
        }
        return $flattenedCookies;
    }
    public function clearCookie(string $name, ?string $path = '/', string $domain = null, bool $secure = false, bool $httpOnly = true, string $sameSite = null)
    {
        $this->setCookie(new Cookie($name, null, 1, $path, $domain, $secure, $httpOnly, false, $sameSite));
    }
    public function makeDisposition(string $disposition, string $filename, string $filenameFallback = '')
    {
        return HeaderUtils::makeDisposition($disposition, $filename, $filenameFallback);
    }
    protected function computeCacheControlValue()
    {
        if (!$this->cacheControl) {
            if ($this->has('Last-Modified') || $this->has('Expires')) {
                return 'private, must-revalidate';
            }
            return 'no-cache, private';
        }
        $header = $this->getCacheControlHeader();
        if (isset($this->cacheControl['public']) || isset($this->cacheControl['private'])) {
            return $header;
        }
        if (!isset($this->cacheControl['s-maxage'])) {
            return $header . ', private';
        }
        return $header;
    }
    private function initDate() : void
    {
        $this->set('Date', gmdate('D, d M Y H:i:s') . ' GMT');
    }
}
}

namespace Symfony\Component\HttpFoundation {
class Cookie
{
    public const SAMESITE_NONE = 'none';
    public const SAMESITE_LAX = 'lax';
    public const SAMESITE_STRICT = 'strict';
    protected $name;
    protected $value;
    protected $domain;
    protected $expire;
    protected $path;
    protected $secure;
    protected $httpOnly;
    private $raw;
    private $sameSite;
    private $secureDefault = false;
    private const RESERVED_CHARS_LIST = "=,; \t\r\n\v\f";
    private const RESERVED_CHARS_FROM = ['=', ',', ';', ' ', "\t", "\r", "\n", "\v", "\f"];
    private const RESERVED_CHARS_TO = ['%3D', '%2C', '%3B', '%20', '%09', '%0D', '%0A', '%0B', '%0C'];
    public static function fromString(string $cookie, bool $decode = false)
    {
        $data = ['expires' => 0, 'path' => '/', 'domain' => null, 'secure' => false, 'httponly' => false, 'raw' => !$decode, 'samesite' => null];
        $parts = HeaderUtils::split($cookie, ';=');
        $part = array_shift($parts);
        $name = $decode ? urldecode($part[0]) : $part[0];
        $value = isset($part[1]) ? $decode ? urldecode($part[1]) : $part[1] : null;
        $data = HeaderUtils::combine($parts) + $data;
        $data['expires'] = self::expiresTimestamp($data['expires']);
        if (isset($data['max-age']) && ($data['max-age'] > 0 || $data['expires'] > time())) {
            $data['expires'] = time() + (int) $data['max-age'];
        }
        return new static($name, $value, $data['expires'], $data['path'], $data['domain'], $data['secure'], $data['httponly'], $data['raw'], $data['samesite']);
    }
    public static function create(string $name, string $value = null, $expire = 0, ?string $path = '/', string $domain = null, bool $secure = null, bool $httpOnly = true, bool $raw = false, ?string $sameSite = self::SAMESITE_LAX) : self
    {
        return new self($name, $value, $expire, $path, $domain, $secure, $httpOnly, $raw, $sameSite);
    }
    public function __construct(string $name, string $value = null, $expire = 0, ?string $path = '/', string $domain = null, bool $secure = null, bool $httpOnly = true, bool $raw = false, ?string $sameSite = 'lax')
    {
        if ($raw && false !== strpbrk($name, self::RESERVED_CHARS_LIST)) {
            throw new \InvalidArgumentException(sprintf('The cookie name "%s" contains invalid characters.', $name));
        }
        if (empty($name)) {
            throw new \InvalidArgumentException('The cookie name cannot be empty.');
        }
        $this->name = $name;
        $this->value = $value;
        $this->domain = $domain;
        $this->expire = self::expiresTimestamp($expire);
        $this->path = empty($path) ? '/' : $path;
        $this->secure = $secure;
        $this->httpOnly = $httpOnly;
        $this->raw = $raw;
        $this->sameSite = $this->withSameSite($sameSite)->sameSite;
    }
    public function withValue(?string $value) : self
    {
        $cookie = clone $this;
        $cookie->value = $value;
        return $cookie;
    }
    public function withDomain(?string $domain) : self
    {
        $cookie = clone $this;
        $cookie->domain = $domain;
        return $cookie;
    }
    public function withExpires($expire = 0) : self
    {
        $cookie = clone $this;
        $cookie->expire = self::expiresTimestamp($expire);
        return $cookie;
    }
    private static function expiresTimestamp($expire = 0) : int
    {
        if ($expire instanceof \DateTimeInterface) {
            $expire = $expire->format('U');
        } elseif (!is_numeric($expire)) {
            $expire = strtotime($expire);
            if (false === $expire) {
                throw new \InvalidArgumentException('The cookie expiration time is not valid.');
            }
        }
        return 0 < $expire ? (int) $expire : 0;
    }
    public function withPath(string $path) : self
    {
        $cookie = clone $this;
        $cookie->path = '' === $path ? '/' : $path;
        return $cookie;
    }
    public function withSecure(bool $secure = true) : self
    {
        $cookie = clone $this;
        $cookie->secure = $secure;
        return $cookie;
    }
    public function withHttpOnly(bool $httpOnly = true) : self
    {
        $cookie = clone $this;
        $cookie->httpOnly = $httpOnly;
        return $cookie;
    }
    public function withRaw(bool $raw = true) : self
    {
        if ($raw && false !== strpbrk($this->name, self::RESERVED_CHARS_LIST)) {
            throw new \InvalidArgumentException(sprintf('The cookie name "%s" contains invalid characters.', $this->name));
        }
        $cookie = clone $this;
        $cookie->raw = $raw;
        return $cookie;
    }
    public function withSameSite(?string $sameSite) : self
    {
        if ('' === $sameSite) {
            $sameSite = null;
        } elseif (null !== $sameSite) {
            $sameSite = strtolower($sameSite);
        }
        if (!\in_array($sameSite, [self::SAMESITE_LAX, self::SAMESITE_STRICT, self::SAMESITE_NONE, null], true)) {
            throw new \InvalidArgumentException('The "sameSite" parameter value is not valid.');
        }
        $cookie = clone $this;
        $cookie->sameSite = $sameSite;
        return $cookie;
    }
    public function __toString()
    {
        if ($this->isRaw()) {
            $str = $this->getName();
        } else {
            $str = str_replace(self::RESERVED_CHARS_FROM, self::RESERVED_CHARS_TO, $this->getName());
        }
        $str .= '=';
        if ('' === (string) $this->getValue()) {
            $str .= 'deleted; expires=' . gmdate('D, d-M-Y H:i:s T', time() - 31536001) . '; Max-Age=0';
        } else {
            $str .= $this->isRaw() ? $this->getValue() : rawurlencode($this->getValue());
            if (0 !== $this->getExpiresTime()) {
                $str .= '; expires=' . gmdate('D, d-M-Y H:i:s T', $this->getExpiresTime()) . '; Max-Age=' . $this->getMaxAge();
            }
        }
        if ($this->getPath()) {
            $str .= '; path=' . $this->getPath();
        }
        if ($this->getDomain()) {
            $str .= '; domain=' . $this->getDomain();
        }
        if (true === $this->isSecure()) {
            $str .= '; secure';
        }
        if (true === $this->isHttpOnly()) {
            $str .= '; httponly';
        }
        if (null !== $this->getSameSite()) {
            $str .= '; samesite=' . $this->getSameSite();
        }
        return $str;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getValue()
    {
        return $this->value;
    }
    public function getDomain()
    {
        return $this->domain;
    }
    public function getExpiresTime()
    {
        return $this->expire;
    }
    public function getMaxAge()
    {
        $maxAge = $this->expire - time();
        return 0 >= $maxAge ? 0 : $maxAge;
    }
    public function getPath()
    {
        return $this->path;
    }
    public function isSecure()
    {
        return $this->secure ?? $this->secureDefault;
    }
    public function isHttpOnly()
    {
        return $this->httpOnly;
    }
    public function isCleared()
    {
        return 0 !== $this->expire && $this->expire < time();
    }
    public function isRaw()
    {
        return $this->raw;
    }
    public function getSameSite()
    {
        return $this->sameSite;
    }
    public function setSecureDefault(bool $default) : void
    {
        $this->secureDefault = $default;
    }
}
}

namespace Illuminate\Support {
use Closure;
use Illuminate\Console\Application as Artisan;
use Illuminate\Contracts\Foundation\CachesConfiguration;
use Illuminate\Contracts\Foundation\CachesRoutes;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Database\Eloquent\Factory as ModelFactory;
use Illuminate\View\Compilers\BladeCompiler;
abstract class ServiceProvider
{
    protected $app;
    protected $bootingCallbacks = [];
    protected $bootedCallbacks = [];
    public static $publishes = [];
    public static $publishGroups = [];
    public function __construct($app)
    {
        $this->app = $app;
    }
    public function register()
    {
    }
    public function booting(Closure $callback)
    {
        $this->bootingCallbacks[] = $callback;
    }
    public function booted(Closure $callback)
    {
        $this->bootedCallbacks[] = $callback;
    }
    public function callBootingCallbacks()
    {
        $index = 0;
        while ($index < count($this->bootingCallbacks)) {
            $this->app->call($this->bootingCallbacks[$index]);
            $index++;
        }
    }
    public function callBootedCallbacks()
    {
        $index = 0;
        while ($index < count($this->bootedCallbacks)) {
            $this->app->call($this->bootedCallbacks[$index]);
            $index++;
        }
    }
    protected function mergeConfigFrom($path, $key)
    {
        if (!($this->app instanceof CachesConfiguration && $this->app->configurationIsCached())) {
            $config = $this->app->make('config');
            $config->set($key, array_merge(require $path, $config->get($key, [])));
        }
    }
    protected function loadRoutesFrom($path)
    {
        if (!($this->app instanceof CachesRoutes && $this->app->routesAreCached())) {
            require $path;
        }
    }
    protected function loadViewsFrom($path, $namespace)
    {
        $this->callAfterResolving('view', function ($view) use($path, $namespace) {
            if (isset($this->app->config['view']['paths']) && is_array($this->app->config['view']['paths'])) {
                foreach ($this->app->config['view']['paths'] as $viewPath) {
                    if (is_dir($appPath = $viewPath . '/vendor/' . $namespace)) {
                        $view->addNamespace($namespace, $appPath);
                    }
                }
            }
            $view->addNamespace($namespace, $path);
        });
    }
    protected function loadViewComponentsAs($prefix, array $components)
    {
        $this->callAfterResolving(BladeCompiler::class, function ($blade) use($prefix, $components) {
            foreach ($components as $alias => $component) {
                $blade->component($component, is_string($alias) ? $alias : null, $prefix);
            }
        });
    }
    protected function loadTranslationsFrom($path, $namespace)
    {
        $this->callAfterResolving('translator', function ($translator) use($path, $namespace) {
            $translator->addNamespace($namespace, $path);
        });
    }
    protected function loadJsonTranslationsFrom($path)
    {
        $this->callAfterResolving('translator', function ($translator) use($path) {
            $translator->addJsonPath($path);
        });
    }
    protected function loadMigrationsFrom($paths)
    {
        $this->callAfterResolving('migrator', function ($migrator) use($paths) {
            foreach ((array) $paths as $path) {
                $migrator->path($path);
            }
        });
    }
    protected function loadFactoriesFrom($paths)
    {
        $this->callAfterResolving(ModelFactory::class, function ($factory) use($paths) {
            foreach ((array) $paths as $path) {
                $factory->load($path);
            }
        });
    }
    protected function callAfterResolving($name, $callback)
    {
        $this->app->afterResolving($name, $callback);
        if ($this->app->resolved($name)) {
            $callback($this->app->make($name), $this->app);
        }
    }
    protected function publishes(array $paths, $groups = null)
    {
        $this->ensurePublishArrayInitialized($class = static::class);
        static::$publishes[$class] = array_merge(static::$publishes[$class], $paths);
        foreach ((array) $groups as $group) {
            $this->addPublishGroup($group, $paths);
        }
    }
    protected function ensurePublishArrayInitialized($class)
    {
        if (!array_key_exists($class, static::$publishes)) {
            static::$publishes[$class] = [];
        }
    }
    protected function addPublishGroup($group, $paths)
    {
        if (!array_key_exists($group, static::$publishGroups)) {
            static::$publishGroups[$group] = [];
        }
        static::$publishGroups[$group] = array_merge(static::$publishGroups[$group], $paths);
    }
    public static function pathsToPublish($provider = null, $group = null)
    {
        if (!is_null($paths = static::pathsForProviderOrGroup($provider, $group))) {
            return $paths;
        }
        return collect(static::$publishes)->reduce(function ($paths, $p) {
            return array_merge($paths, $p);
        }, []);
    }
    protected static function pathsForProviderOrGroup($provider, $group)
    {
        if ($provider && $group) {
            return static::pathsForProviderAndGroup($provider, $group);
        } elseif ($group && array_key_exists($group, static::$publishGroups)) {
            return static::$publishGroups[$group];
        } elseif ($provider && array_key_exists($provider, static::$publishes)) {
            return static::$publishes[$provider];
        } elseif ($group || $provider) {
            return [];
        }
    }
    protected static function pathsForProviderAndGroup($provider, $group)
    {
        if (!empty(static::$publishes[$provider]) && !empty(static::$publishGroups[$group])) {
            return array_intersect_key(static::$publishes[$provider], static::$publishGroups[$group]);
        }
        return [];
    }
    public static function publishableProviders()
    {
        return array_keys(static::$publishes);
    }
    public static function publishableGroups()
    {
        return array_keys(static::$publishGroups);
    }
    public function commands($commands)
    {
        $commands = is_array($commands) ? $commands : func_get_args();
        Artisan::starting(function ($artisan) use($commands) {
            $artisan->resolveCommands($commands);
        });
    }
    public function provides()
    {
        return [];
    }
    public function when()
    {
        return [];
    }
    public function isDeferred()
    {
        return $this instanceof DeferrableProvider;
    }
}
}

namespace Illuminate\Support {
class AggregateServiceProvider extends ServiceProvider
{
    protected $providers = [];
    protected $instances = [];
    public function register()
    {
        $this->instances = [];
        foreach ($this->providers as $provider) {
            $this->instances[] = $this->app->register($provider);
        }
    }
    public function provides()
    {
        $provides = [];
        foreach ($this->providers as $provider) {
            $instance = $this->app->resolveProvider($provider);
            $provides = array_merge($provides, $instance->provides());
        }
        return $provides;
    }
}
}

namespace Illuminate\Support\Facades {
use Closure;
use Mockery;
use Mockery\LegacyMockInterface;
use RuntimeException;
abstract class Facade
{
    protected static $app;
    protected static $resolvedInstance;
    public static function resolved(Closure $callback)
    {
        $accessor = static::getFacadeAccessor();
        if (static::$app->resolved($accessor) === true) {
            $callback(static::getFacadeRoot());
        }
        static::$app->afterResolving($accessor, function ($service) use($callback) {
            $callback($service);
        });
    }
    public static function spy()
    {
        if (!static::isMock()) {
            $class = static::getMockableClass();
            return tap($class ? Mockery::spy($class) : Mockery::spy(), function ($spy) {
                static::swap($spy);
            });
        }
    }
    public static function partialMock()
    {
        $name = static::getFacadeAccessor();
        $mock = static::isMock() ? static::$resolvedInstance[$name] : static::createFreshMockInstance();
        return $mock->makePartial();
    }
    public static function shouldReceive()
    {
        $name = static::getFacadeAccessor();
        $mock = static::isMock() ? static::$resolvedInstance[$name] : static::createFreshMockInstance();
        return $mock->shouldReceive(...func_get_args());
    }
    protected static function createFreshMockInstance()
    {
        return tap(static::createMock(), function ($mock) {
            static::swap($mock);
            $mock->shouldAllowMockingProtectedMethods();
        });
    }
    protected static function createMock()
    {
        $class = static::getMockableClass();
        return $class ? Mockery::mock($class) : Mockery::mock();
    }
    protected static function isMock()
    {
        $name = static::getFacadeAccessor();
        return isset(static::$resolvedInstance[$name]) && static::$resolvedInstance[$name] instanceof LegacyMockInterface;
    }
    protected static function getMockableClass()
    {
        if ($root = static::getFacadeRoot()) {
            return get_class($root);
        }
    }
    public static function swap($instance)
    {
        static::$resolvedInstance[static::getFacadeAccessor()] = $instance;
        if (isset(static::$app)) {
            static::$app->instance(static::getFacadeAccessor(), $instance);
        }
    }
    public static function getFacadeRoot()
    {
        return static::resolveFacadeInstance(static::getFacadeAccessor());
    }
    protected static function getFacadeAccessor()
    {
        throw new RuntimeException('Facade does not implement getFacadeAccessor method.');
    }
    protected static function resolveFacadeInstance($name)
    {
        if (is_object($name)) {
            return $name;
        }
        if (isset(static::$resolvedInstance[$name])) {
            return static::$resolvedInstance[$name];
        }
        if (static::$app) {
            return static::$resolvedInstance[$name] = static::$app[$name];
        }
    }
    public static function clearResolvedInstance($name)
    {
        unset(static::$resolvedInstance[$name]);
    }
    public static function clearResolvedInstances()
    {
        static::$resolvedInstance = [];
    }
    public static function getFacadeApplication()
    {
        return static::$app;
    }
    public static function setFacadeApplication($app)
    {
        static::$app = $app;
    }
    public static function __callStatic($method, $args)
    {
        $instance = static::getFacadeRoot();
        if (!$instance) {
            throw new RuntimeException('A facade root has not been set.');
        }
        return $instance->{$method}(...$args);
    }
}
}

namespace Illuminate\Support {
use Illuminate\Support\Traits\Macroable;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use Ramsey\Uuid\Codec\TimestampFirstCombCodec;
use Ramsey\Uuid\Generator\CombGenerator;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactory;
use voku\helper\ASCII;
class Str
{
    use Macroable;
    protected static $snakeCache = [];
    protected static $camelCache = [];
    protected static $studlyCache = [];
    protected static $uuidFactory;
    public static function of($string)
    {
        return new Stringable($string);
    }
    public static function after($subject, $search)
    {
        return $search === '' ? $subject : array_reverse(explode($search, $subject, 2))[0];
    }
    public static function afterLast($subject, $search)
    {
        if ($search === '') {
            return $subject;
        }
        $position = strrpos($subject, (string) $search);
        if ($position === false) {
            return $subject;
        }
        return substr($subject, $position + strlen($search));
    }
    public static function ascii($value, $language = 'en')
    {
        return ASCII::to_ascii((string) $value, $language);
    }
    public static function transliterate($string, $unknown = '?', $strict = false)
    {
        return ASCII::to_transliterate($string, $unknown, $strict);
    }
    public static function before($subject, $search)
    {
        if ($search === '') {
            return $subject;
        }
        $result = strstr($subject, (string) $search, true);
        return $result === false ? $subject : $result;
    }
    public static function beforeLast($subject, $search)
    {
        if ($search === '') {
            return $subject;
        }
        $pos = mb_strrpos($subject, $search);
        if ($pos === false) {
            return $subject;
        }
        return static::substr($subject, 0, $pos);
    }
    public static function between($subject, $from, $to)
    {
        if ($from === '' || $to === '') {
            return $subject;
        }
        return static::beforeLast(static::after($subject, $from), $to);
    }
    public static function camel($value)
    {
        if (isset(static::$camelCache[$value])) {
            return static::$camelCache[$value];
        }
        return static::$camelCache[$value] = lcfirst(static::studly($value));
    }
    public static function contains($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ($needle !== '' && mb_strpos($haystack, $needle) !== false) {
                return true;
            }
        }
        return false;
    }
    public static function containsAll($haystack, array $needles)
    {
        foreach ($needles as $needle) {
            if (!static::contains($haystack, $needle)) {
                return false;
            }
        }
        return true;
    }
    public static function endsWith($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ($needle !== '' && $needle !== null && substr($haystack, -strlen($needle)) === (string) $needle) {
                return true;
            }
        }
        return false;
    }
    public static function finish($value, $cap)
    {
        $quoted = preg_quote($cap, '/');
        return preg_replace('/(?:' . $quoted . ')+$/u', '', $value) . $cap;
    }
    public static function is($pattern, $value)
    {
        $patterns = Arr::wrap($pattern);
        $value = (string) $value;
        if (empty($patterns)) {
            return false;
        }
        foreach ($patterns as $pattern) {
            $pattern = (string) $pattern;
            if ($pattern == $value) {
                return true;
            }
            $pattern = preg_quote($pattern, '#');
            $pattern = str_replace('\\*', '.*', $pattern);
            if (preg_match('#^' . $pattern . '\\z#u', $value) === 1) {
                return true;
            }
        }
        return false;
    }
    public static function isAscii($value)
    {
        return ASCII::is_ascii((string) $value);
    }
    public static function isUuid($value)
    {
        if (!is_string($value)) {
            return false;
        }
        return preg_match('/^[\\da-f]{8}-[\\da-f]{4}-[\\da-f]{4}-[\\da-f]{4}-[\\da-f]{12}$/iD', $value) > 0;
    }
    public static function kebab($value)
    {
        return static::snake($value, '-');
    }
    public static function length($value, $encoding = null)
    {
        if ($encoding) {
            return mb_strlen($value, $encoding);
        }
        return mb_strlen($value);
    }
    public static function limit($value, $limit = 100, $end = '...')
    {
        if (mb_strwidth($value, 'UTF-8') <= $limit) {
            return $value;
        }
        return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')) . $end;
    }
    public static function lower($value)
    {
        return mb_strtolower($value, 'UTF-8');
    }
    public static function words($value, $words = 100, $end = '...')
    {
        preg_match('/^\\s*+(?:\\S++\\s*+){1,' . $words . '}/u', $value, $matches);
        if (!isset($matches[0]) || static::length($value) === static::length($matches[0])) {
            return $value;
        }
        return rtrim($matches[0]) . $end;
    }
    public static function markdown($string, array $options = [])
    {
        $converter = new GithubFlavoredMarkdownConverter($options);
        return (string) $converter->convertToHtml($string);
    }
    public static function mask($string, $character, $index, $length = null, $encoding = 'UTF-8')
    {
        if ($character === '') {
            return $string;
        }
        if (is_null($length) && PHP_MAJOR_VERSION < 8) {
            $length = mb_strlen($string, $encoding);
        }
        $segment = mb_substr($string, $index, $length, $encoding);
        if ($segment === '') {
            return $string;
        }
        $start = mb_substr($string, 0, mb_strpos($string, $segment, 0, $encoding), $encoding);
        $end = mb_substr($string, mb_strpos($string, $segment, 0, $encoding) + mb_strlen($segment, $encoding));
        return $start . str_repeat(mb_substr($character, 0, 1, $encoding), mb_strlen($segment, $encoding)) . $end;
    }
    public static function match($pattern, $subject)
    {
        preg_match($pattern, $subject, $matches);
        if (!$matches) {
            return '';
        }
        return $matches[1] ?? $matches[0];
    }
    public static function matchAll($pattern, $subject)
    {
        preg_match_all($pattern, $subject, $matches);
        if (empty($matches[0])) {
            return collect();
        }
        return collect($matches[1] ?? $matches[0]);
    }
    public static function padBoth($value, $length, $pad = ' ')
    {
        return str_pad($value, strlen($value) - mb_strlen($value) + $length, $pad, STR_PAD_BOTH);
    }
    public static function padLeft($value, $length, $pad = ' ')
    {
        return str_pad($value, strlen($value) - mb_strlen($value) + $length, $pad, STR_PAD_LEFT);
    }
    public static function padRight($value, $length, $pad = ' ')
    {
        return str_pad($value, strlen($value) - mb_strlen($value) + $length, $pad, STR_PAD_RIGHT);
    }
    public static function parseCallback($callback, $default = null)
    {
        return static::contains($callback, '@') ? explode('@', $callback, 2) : [$callback, $default];
    }
    public static function plural($value, $count = 2)
    {
        return Pluralizer::plural($value, $count);
    }
    public static function pluralStudly($value, $count = 2)
    {
        $parts = preg_split('/(.)(?=[A-Z])/u', $value, -1, PREG_SPLIT_DELIM_CAPTURE);
        $lastWord = array_pop($parts);
        return implode('', $parts) . self::plural($lastWord, $count);
    }
    public static function random($length = 16)
    {
        $string = '';
        while (($len = strlen($string)) < $length) {
            $size = $length - $len;
            $bytes = random_bytes($size);
            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }
        return $string;
    }
    public static function repeat(string $string, int $times)
    {
        return str_repeat($string, $times);
    }
    public static function replaceArray($search, array $replace, $subject)
    {
        $segments = explode($search, $subject);
        $result = array_shift($segments);
        foreach ($segments as $segment) {
            $result .= (array_shift($replace) ?? $search) . $segment;
        }
        return $result;
    }
    public static function replace($search, $replace, $subject)
    {
        return str_replace($search, $replace, $subject);
    }
    public static function replaceFirst($search, $replace, $subject)
    {
        if ($search === '') {
            return $subject;
        }
        $position = strpos($subject, $search);
        if ($position !== false) {
            return substr_replace($subject, $replace, $position, strlen($search));
        }
        return $subject;
    }
    public static function replaceLast($search, $replace, $subject)
    {
        if ($search === '') {
            return $subject;
        }
        $position = strrpos($subject, $search);
        if ($position !== false) {
            return substr_replace($subject, $replace, $position, strlen($search));
        }
        return $subject;
    }
    public static function remove($search, $subject, $caseSensitive = true)
    {
        $subject = $caseSensitive ? str_replace($search, '', $subject) : str_ireplace($search, '', $subject);
        return $subject;
    }
    public static function reverse(string $value)
    {
        return implode(array_reverse(mb_str_split($value)));
    }
    public static function start($value, $prefix)
    {
        $quoted = preg_quote($prefix, '/');
        return $prefix . preg_replace('/^(?:' . $quoted . ')+/u', '', $value);
    }
    public static function upper($value)
    {
        return mb_strtoupper($value, 'UTF-8');
    }
    public static function title($value)
    {
        return mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
    }
    public static function headline($value)
    {
        $parts = explode(' ', $value);
        $parts = count($parts) > 1 ? $parts = array_map([static::class, 'title'], $parts) : ($parts = array_map([static::class, 'title'], static::ucsplit(implode('_', $parts))));
        $collapsed = static::replace(['-', '_', ' '], '_', implode('_', $parts));
        return implode(' ', array_filter(explode('_', $collapsed)));
    }
    public static function singular($value)
    {
        return Pluralizer::singular($value);
    }
    public static function slug($title, $separator = '-', $language = 'en')
    {
        $title = $language ? static::ascii($title, $language) : $title;
        $flip = $separator === '-' ? '_' : '-';
        $title = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, $title);
        $title = str_replace('@', $separator . 'at' . $separator, $title);
        $title = preg_replace('![^' . preg_quote($separator) . '\\pL\\pN\\s]+!u', '', static::lower($title));
        $title = preg_replace('![' . preg_quote($separator) . '\\s]+!u', $separator, $title);
        return trim($title, $separator);
    }
    public static function snake($value, $delimiter = '_')
    {
        $key = $value;
        if (isset(static::$snakeCache[$key][$delimiter])) {
            return static::$snakeCache[$key][$delimiter];
        }
        if (!ctype_lower($value)) {
            $value = preg_replace('/\\s+/u', '', ucwords($value));
            $value = static::lower(preg_replace('/(.)(?=[A-Z])/u', '$1' . $delimiter, $value));
        }
        return static::$snakeCache[$key][$delimiter] = $value;
    }
    public static function startsWith($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ((string) $needle !== '' && strncmp($haystack, $needle, strlen($needle)) === 0) {
                return true;
            }
        }
        return false;
    }
    public static function studly($value)
    {
        $key = $value;
        if (isset(static::$studlyCache[$key])) {
            return static::$studlyCache[$key];
        }
        $words = explode(' ', static::replace(['-', '_'], ' ', $value));
        $studlyWords = array_map(function ($word) {
            return static::ucfirst($word);
        }, $words);
        return static::$studlyCache[$key] = implode($studlyWords);
    }
    public static function substr($string, $start, $length = null)
    {
        return mb_substr($string, $start, $length, 'UTF-8');
    }
    public static function substrCount($haystack, $needle, $offset = 0, $length = null)
    {
        if (!is_null($length)) {
            return substr_count($haystack, $needle, $offset, $length);
        } else {
            return substr_count($haystack, $needle, $offset);
        }
    }
    public static function substrReplace($string, $replace, $offset = 0, $length = null)
    {
        if ($length === null) {
            $length = strlen($string);
        }
        return substr_replace($string, $replace, $offset, $length);
    }
    public static function swap(array $map, $subject)
    {
        return strtr($subject, $map);
    }
    public static function ucfirst($string)
    {
        return static::upper(static::substr($string, 0, 1)) . static::substr($string, 1);
    }
    public static function ucsplit($string)
    {
        return preg_split('/(?=\\p{Lu})/u', $string, -1, PREG_SPLIT_NO_EMPTY);
    }
    public static function wordCount($string)
    {
        return str_word_count($string);
    }
    public static function uuid()
    {
        return static::$uuidFactory ? call_user_func(static::$uuidFactory) : Uuid::uuid4();
    }
    public static function orderedUuid()
    {
        if (static::$uuidFactory) {
            return call_user_func(static::$uuidFactory);
        }
        $factory = new UuidFactory();
        $factory->setRandomGenerator(new CombGenerator($factory->getRandomGenerator(), $factory->getNumberConverter()));
        $factory->setCodec(new TimestampFirstCombCodec($factory->getUuidBuilder()));
        return $factory->uuid4();
    }
    public static function createUuidsUsing(callable $factory = null)
    {
        static::$uuidFactory = $factory;
    }
    public static function createUuidsNormally()
    {
        static::$uuidFactory = null;
    }
    public static function flushCache()
    {
        static::$snakeCache = [];
        static::$camelCache = [];
        static::$studlyCache = [];
    }
}
}

namespace Illuminate\Support {
class NamespacedItemResolver
{
    protected $parsed = [];
    public function parseKey($key)
    {
        if (isset($this->parsed[$key])) {
            return $this->parsed[$key];
        }
        if (strpos($key, '::') === false) {
            $segments = explode('.', $key);
            $parsed = $this->parseBasicSegments($segments);
        } else {
            $parsed = $this->parseNamespacedSegments($key);
        }
        return $this->parsed[$key] = $parsed;
    }
    protected function parseBasicSegments(array $segments)
    {
        $group = $segments[0];
        $item = count($segments) === 1 ? null : implode('.', array_slice($segments, 1));
        return [null, $group, $item];
    }
    protected function parseNamespacedSegments($key)
    {
        [$namespace, $item] = explode('::', $key);
        $itemSegments = explode('.', $item);
        $groupAndItem = array_slice($this->parseBasicSegments($itemSegments), 1);
        return array_merge([$namespace], $groupAndItem);
    }
    public function setParsedKey($key, $parsed)
    {
        $this->parsed[$key] = $parsed;
    }
    public function flushParsedKeys()
    {
        $this->parsed = [];
    }
}
}

namespace Illuminate\Support\Facades {
class App extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'app';
    }
}
}

namespace Illuminate\Support\Facades {
class Route extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'router';
    }
}
}

namespace Illuminate\Support {
use Countable;
use Illuminate\Contracts\Support\MessageBag as MessageBagContract;
class ViewErrorBag implements Countable
{
    protected $bags = [];
    public function hasBag($key = 'default')
    {
        return isset($this->bags[$key]);
    }
    public function getBag($key)
    {
        return Arr::get($this->bags, $key) ?: new MessageBag();
    }
    public function getBags()
    {
        return $this->bags;
    }
    public function put($key, MessageBagContract $bag)
    {
        $this->bags[$key] = $bag;
        return $this;
    }
    public function any()
    {
        return $this->count() > 0;
    }
    public function count()
    {
        return $this->getBag('default')->count();
    }
    public function __call($method, $parameters)
    {
        return $this->getBag('default')->{$method}(...$parameters);
    }
    public function __get($key)
    {
        return $this->getBag($key);
    }
    public function __set($key, $value)
    {
        $this->put($key, $value);
    }
    public function __toString()
    {
        return (string) $this->getBag('default');
    }
}
}

namespace Illuminate\Support {
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\MessageBag as MessageBagContract;
use Illuminate\Contracts\Support\MessageProvider;
use JsonSerializable;
class MessageBag implements Jsonable, JsonSerializable, MessageBagContract, MessageProvider
{
    protected $messages = [];
    protected $format = ':message';
    public function __construct(array $messages = [])
    {
        foreach ($messages as $key => $value) {
            $value = $value instanceof Arrayable ? $value->toArray() : (array) $value;
            $this->messages[$key] = array_unique($value);
        }
    }
    public function keys()
    {
        return array_keys($this->messages);
    }
    public function add($key, $message)
    {
        if ($this->isUnique($key, $message)) {
            $this->messages[$key][] = $message;
        }
        return $this;
    }
    public function addIf($boolean, $key, $message)
    {
        return $boolean ? $this->add($key, $message) : $this;
    }
    protected function isUnique($key, $message)
    {
        $messages = (array) $this->messages;
        return !isset($messages[$key]) || !in_array($message, $messages[$key]);
    }
    public function merge($messages)
    {
        if ($messages instanceof MessageProvider) {
            $messages = $messages->getMessageBag()->getMessages();
        }
        $this->messages = array_merge_recursive($this->messages, $messages);
        return $this;
    }
    public function has($key)
    {
        if ($this->isEmpty()) {
            return false;
        }
        if (is_null($key)) {
            return $this->any();
        }
        $keys = is_array($key) ? $key : func_get_args();
        foreach ($keys as $key) {
            if ($this->first($key) === '') {
                return false;
            }
        }
        return true;
    }
    public function hasAny($keys = [])
    {
        if ($this->isEmpty()) {
            return false;
        }
        $keys = is_array($keys) ? $keys : func_get_args();
        foreach ($keys as $key) {
            if ($this->has($key)) {
                return true;
            }
        }
        return false;
    }
    public function first($key = null, $format = null)
    {
        $messages = is_null($key) ? $this->all($format) : $this->get($key, $format);
        $firstMessage = Arr::first($messages, null, '');
        return is_array($firstMessage) ? Arr::first($firstMessage) : $firstMessage;
    }
    public function get($key, $format = null)
    {
        if (array_key_exists($key, $this->messages)) {
            return $this->transform($this->messages[$key], $this->checkFormat($format), $key);
        }
        if (Str::contains($key, '*')) {
            return $this->getMessagesForWildcardKey($key, $format);
        }
        return [];
    }
    protected function getMessagesForWildcardKey($key, $format)
    {
        return collect($this->messages)->filter(function ($messages, $messageKey) use($key) {
            return Str::is($key, $messageKey);
        })->map(function ($messages, $messageKey) use($format) {
            return $this->transform($messages, $this->checkFormat($format), $messageKey);
        })->all();
    }
    public function all($format = null)
    {
        $format = $this->checkFormat($format);
        $all = [];
        foreach ($this->messages as $key => $messages) {
            $all = array_merge($all, $this->transform($messages, $format, $key));
        }
        return $all;
    }
    public function unique($format = null)
    {
        return array_unique($this->all($format));
    }
    protected function transform($messages, $format, $messageKey)
    {
        return collect((array) $messages)->map(function ($message) use($format, $messageKey) {
            return str_replace([':message', ':key'], [$message, $messageKey], $format);
        })->all();
    }
    protected function checkFormat($format)
    {
        return $format ?: $this->format;
    }
    public function messages()
    {
        return $this->messages;
    }
    public function getMessages()
    {
        return $this->messages();
    }
    public function getMessageBag()
    {
        return $this;
    }
    public function getFormat()
    {
        return $this->format;
    }
    public function setFormat($format = ':message')
    {
        $this->format = $format;
        return $this;
    }
    public function isEmpty()
    {
        return !$this->any();
    }
    public function isNotEmpty()
    {
        return $this->any();
    }
    public function any()
    {
        return $this->count() > 0;
    }
    public function count()
    {
        return count($this->messages, COUNT_RECURSIVE) - count($this->messages);
    }
    public function toArray()
    {
        return $this->getMessages();
    }
    public function jsonSerialize()
    {
        return $this->toArray();
    }
    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }
    public function __toString()
    {
        return $this->toJson();
    }
}
}

namespace Illuminate\Support\Facades {
class View extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'view';
    }
}
}

namespace Illuminate\Support {
use Closure;
use Illuminate\Contracts\Container\Container;
use InvalidArgumentException;
abstract class Manager
{
    protected $container;
    protected $config;
    protected $customCreators = [];
    protected $drivers = [];
    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->config = $container->make('config');
    }
    public abstract function getDefaultDriver();
    public function driver($driver = null)
    {
        $driver = $driver ?: $this->getDefaultDriver();
        if (is_null($driver)) {
            throw new InvalidArgumentException(sprintf('Unable to resolve NULL driver for [%s].', static::class));
        }
        if (!isset($this->drivers[$driver])) {
            $this->drivers[$driver] = $this->createDriver($driver);
        }
        return $this->drivers[$driver];
    }
    protected function createDriver($driver)
    {
        if (isset($this->customCreators[$driver])) {
            return $this->callCustomCreator($driver);
        } else {
            $method = 'create' . Str::studly($driver) . 'Driver';
            if (method_exists($this, $method)) {
                return $this->{$method}();
            }
        }
        throw new InvalidArgumentException("Driver [{$driver}] not supported.");
    }
    protected function callCustomCreator($driver)
    {
        return $this->customCreators[$driver]($this->container);
    }
    public function extend($driver, Closure $callback)
    {
        $this->customCreators[$driver] = $callback;
        return $this;
    }
    public function getDrivers()
    {
        return $this->drivers;
    }
    public function getContainer()
    {
        return $this->container;
    }
    public function setContainer(Container $container)
    {
        $this->container = $container;
        return $this;
    }
    public function forgetDrivers()
    {
        $this->drivers = [];
        return $this;
    }
    public function __call($method, $parameters)
    {
        return $this->driver()->{$method}(...$parameters);
    }
}
}

namespace Illuminate\Support\Facades {
class Log extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'log';
    }
}
}

namespace Illuminate\Events {
use Closure;
use Exception;
use Illuminate\Container\Container;
use Illuminate\Contracts\Broadcasting\Factory as BroadcastFactory;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Container\Container as ContainerContract;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Contracts\Queue\ShouldBeEncrypted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Support\Traits\ReflectsClosures;
use ReflectionClass;
class Dispatcher implements DispatcherContract
{
    use Macroable, ReflectsClosures;
    protected $container;
    protected $listeners = [];
    protected $wildcards = [];
    protected $wildcardsCache = [];
    protected $queueResolver;
    public function __construct(ContainerContract $container = null)
    {
        $this->container = $container ?: new Container();
    }
    public function listen($events, $listener = null)
    {
        if ($events instanceof Closure) {
            return collect($this->firstClosureParameterTypes($events))->each(function ($event) use($events) {
                $this->listen($event, $events);
            });
        } elseif ($events instanceof QueuedClosure) {
            return collect($this->firstClosureParameterTypes($events->closure))->each(function ($event) use($events) {
                $this->listen($event, $events->resolve());
            });
        } elseif ($listener instanceof QueuedClosure) {
            $listener = $listener->resolve();
        }
        foreach ((array) $events as $event) {
            if (Str::contains($event, '*')) {
                $this->setupWildcardListen($event, $listener);
            } else {
                $this->listeners[$event][] = $this->makeListener($listener);
            }
        }
    }
    protected function setupWildcardListen($event, $listener)
    {
        $this->wildcards[$event][] = $this->makeListener($listener, true);
        $this->wildcardsCache = [];
    }
    public function hasListeners($eventName)
    {
        return isset($this->listeners[$eventName]) || isset($this->wildcards[$eventName]) || $this->hasWildcardListeners($eventName);
    }
    public function hasWildcardListeners($eventName)
    {
        foreach ($this->wildcards as $key => $listeners) {
            if (Str::is($key, $eventName)) {
                return true;
            }
        }
        return false;
    }
    public function push($event, $payload = [])
    {
        $this->listen($event . '_pushed', function () use($event, $payload) {
            $this->dispatch($event, $payload);
        });
    }
    public function flush($event)
    {
        $this->dispatch($event . '_pushed');
    }
    public function subscribe($subscriber)
    {
        $subscriber = $this->resolveSubscriber($subscriber);
        $events = $subscriber->subscribe($this);
        if (is_array($events)) {
            foreach ($events as $event => $listeners) {
                foreach (Arr::wrap($listeners) as $listener) {
                    if (is_string($listener) && method_exists($subscriber, $listener)) {
                        $this->listen($event, [get_class($subscriber), $listener]);
                        continue;
                    }
                    $this->listen($event, $listener);
                }
            }
        }
    }
    protected function resolveSubscriber($subscriber)
    {
        if (is_string($subscriber)) {
            return $this->container->make($subscriber);
        }
        return $subscriber;
    }
    public function until($event, $payload = [])
    {
        return $this->dispatch($event, $payload, true);
    }
    public function dispatch($event, $payload = [], $halt = false)
    {
        [$event, $payload] = $this->parseEventAndPayload($event, $payload);
        if ($this->shouldBroadcast($payload)) {
            $this->broadcastEvent($payload[0]);
        }
        $responses = [];
        foreach ($this->getListeners($event) as $listener) {
            $response = $listener($event, $payload);
            if ($halt && !is_null($response)) {
                return $response;
            }
            if ($response === false) {
                break;
            }
            $responses[] = $response;
        }
        return $halt ? null : $responses;
    }
    protected function parseEventAndPayload($event, $payload)
    {
        if (is_object($event)) {
            [$payload, $event] = [[$event], get_class($event)];
        }
        return [$event, Arr::wrap($payload)];
    }
    protected function shouldBroadcast(array $payload)
    {
        return isset($payload[0]) && $payload[0] instanceof ShouldBroadcast && $this->broadcastWhen($payload[0]);
    }
    protected function broadcastWhen($event)
    {
        return method_exists($event, 'broadcastWhen') ? $event->broadcastWhen() : true;
    }
    protected function broadcastEvent($event)
    {
        $this->container->make(BroadcastFactory::class)->queue($event);
    }
    public function getListeners($eventName)
    {
        $listeners = $this->listeners[$eventName] ?? [];
        $listeners = array_merge($listeners, $this->wildcardsCache[$eventName] ?? $this->getWildcardListeners($eventName));
        return class_exists($eventName, false) ? $this->addInterfaceListeners($eventName, $listeners) : $listeners;
    }
    protected function getWildcardListeners($eventName)
    {
        $wildcards = [];
        foreach ($this->wildcards as $key => $listeners) {
            if (Str::is($key, $eventName)) {
                $wildcards = array_merge($wildcards, $listeners);
            }
        }
        return $this->wildcardsCache[$eventName] = $wildcards;
    }
    protected function addInterfaceListeners($eventName, array $listeners = [])
    {
        foreach (class_implements($eventName) as $interface) {
            if (isset($this->listeners[$interface])) {
                foreach ($this->listeners[$interface] as $names) {
                    $listeners = array_merge($listeners, (array) $names);
                }
            }
        }
        return $listeners;
    }
    public function makeListener($listener, $wildcard = false)
    {
        if (is_string($listener)) {
            return $this->createClassListener($listener, $wildcard);
        }
        if (is_array($listener) && isset($listener[0]) && is_string($listener[0])) {
            return $this->createClassListener($listener, $wildcard);
        }
        return function ($event, $payload) use($listener, $wildcard) {
            if ($wildcard) {
                return $listener($event, $payload);
            }
            return $listener(...array_values($payload));
        };
    }
    public function createClassListener($listener, $wildcard = false)
    {
        return function ($event, $payload) use($listener, $wildcard) {
            if ($wildcard) {
                return call_user_func($this->createClassCallable($listener), $event, $payload);
            }
            $callable = $this->createClassCallable($listener);
            return $callable(...array_values($payload));
        };
    }
    protected function createClassCallable($listener)
    {
        [$class, $method] = is_array($listener) ? $listener : $this->parseClassCallable($listener);
        if (!method_exists($class, $method)) {
            $method = '__invoke';
        }
        if ($this->handlerShouldBeQueued($class)) {
            return $this->createQueuedHandlerCallable($class, $method);
        }
        $listener = $this->container->make($class);
        return $this->handlerShouldBeDispatchedAfterDatabaseTransactions($listener) ? $this->createCallbackForListenerRunningAfterCommits($listener, $method) : [$listener, $method];
    }
    protected function parseClassCallable($listener)
    {
        return Str::parseCallback($listener, 'handle');
    }
    protected function handlerShouldBeQueued($class)
    {
        try {
            return (new ReflectionClass($class))->implementsInterface(ShouldQueue::class);
        } catch (Exception $e) {
            return false;
        }
    }
    protected function createQueuedHandlerCallable($class, $method)
    {
        return function () use($class, $method) {
            $arguments = array_map(function ($a) {
                return is_object($a) ? clone $a : $a;
            }, func_get_args());
            if ($this->handlerWantsToBeQueued($class, $arguments)) {
                $this->queueHandler($class, $method, $arguments);
            }
        };
    }
    protected function handlerShouldBeDispatchedAfterDatabaseTransactions($listener)
    {
        return ($listener->afterCommit ?? null) && $this->container->bound('db.transactions');
    }
    protected function createCallbackForListenerRunningAfterCommits($listener, $method)
    {
        return function () use($method, $listener) {
            $payload = func_get_args();
            $this->container->make('db.transactions')->addCallback(function () use($listener, $method, $payload) {
                $listener->{$method}(...$payload);
            });
        };
    }
    protected function handlerWantsToBeQueued($class, $arguments)
    {
        $instance = $this->container->make($class);
        if (method_exists($instance, 'shouldQueue')) {
            return $instance->shouldQueue($arguments[0]);
        }
        return true;
    }
    protected function queueHandler($class, $method, $arguments)
    {
        [$listener, $job] = $this->createListenerAndJob($class, $method, $arguments);
        $connection = $this->resolveQueue()->connection(method_exists($listener, 'viaConnection') ? $listener->viaConnection() : $listener->connection ?? null);
        $queue = method_exists($listener, 'viaQueue') ? $listener->viaQueue() : $listener->queue ?? null;
        isset($listener->delay) ? $connection->laterOn($queue, $listener->delay, $job) : $connection->pushOn($queue, $job);
    }
    protected function createListenerAndJob($class, $method, $arguments)
    {
        $listener = (new ReflectionClass($class))->newInstanceWithoutConstructor();
        return [$listener, $this->propagateListenerOptions($listener, new CallQueuedListener($class, $method, $arguments))];
    }
    protected function propagateListenerOptions($listener, $job)
    {
        return tap($job, function ($job) use($listener) {
            $job->afterCommit = property_exists($listener, 'afterCommit') ? $listener->afterCommit : null;
            $job->backoff = method_exists($listener, 'backoff') ? $listener->backoff() : $listener->backoff ?? null;
            $job->maxExceptions = $listener->maxExceptions ?? null;
            $job->retryUntil = method_exists($listener, 'retryUntil') ? $listener->retryUntil() : null;
            $job->shouldBeEncrypted = $listener instanceof ShouldBeEncrypted;
            $job->timeout = $listener->timeout ?? null;
            $job->tries = $listener->tries ?? null;
            $job->through(array_merge(method_exists($listener, 'middleware') ? $listener->middleware() : [], $listener->middleware ?? []));
        });
    }
    public function forget($event)
    {
        if (Str::contains($event, '*')) {
            unset($this->wildcards[$event]);
        } else {
            unset($this->listeners[$event]);
        }
        foreach ($this->wildcardsCache as $key => $listeners) {
            if (Str::is($event, $key)) {
                unset($this->wildcardsCache[$key]);
            }
        }
    }
    public function forgetPushed()
    {
        foreach ($this->listeners as $key => $value) {
            if (Str::endsWith($key, '_pushed')) {
                $this->forget($key);
            }
        }
    }
    protected function resolveQueue()
    {
        return call_user_func($this->queueResolver);
    }
    public function setQueueResolver(callable $resolver)
    {
        $this->queueResolver = $resolver;
        return $this;
    }
}
}

namespace Illuminate\Events {
use Illuminate\Contracts\Queue\Factory as QueueFactoryContract;
use Illuminate\Support\ServiceProvider;
class EventServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('events', function ($app) {
            return (new Dispatcher($app))->setQueueResolver(function () use($app) {
                return $app->make(QueueFactoryContract::class);
            });
        });
    }
}
}

namespace Illuminate\Validation {
use BadMethodCallException;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ImplicitRule;
use Illuminate\Contracts\Validation\Rule as RuleContract;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Contracts\Validation\ValidatorAwareRule;
use Illuminate\Support\Arr;
use Illuminate\Support\Fluent;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Str;
use Illuminate\Support\ValidatedInput;
use InvalidArgumentException;
use RuntimeException;
use stdClass;
use Symfony\Component\HttpFoundation\File\UploadedFile;
class Validator implements ValidatorContract
{
    use Concerns\FormatsMessages, Concerns\ValidatesAttributes;
    protected $translator;
    protected $container;
    protected $presenceVerifier;
    protected $failedRules = [];
    protected $excludeAttributes = [];
    protected $messages;
    protected $data;
    protected $initialRules;
    protected $rules;
    protected $currentRule;
    protected $implicitAttributes = [];
    protected $implicitAttributesFormatter;
    protected $distinctValues = [];
    protected $after = [];
    public $customMessages = [];
    public $fallbackMessages = [];
    public $customAttributes = [];
    public $customValues = [];
    protected $stopOnFirstFailure = false;
    public $excludeUnvalidatedArrayKeys = false;
    public $extensions = [];
    public $replacers = [];
    protected $fileRules = ['Between', 'Dimensions', 'File', 'Image', 'Max', 'Mimes', 'Mimetypes', 'Min', 'Size'];
    protected $implicitRules = ['Accepted', 'AcceptedIf', 'Declined', 'DeclinedIf', 'Filled', 'Present', 'Required', 'RequiredIf', 'RequiredUnless', 'RequiredWith', 'RequiredWithAll', 'RequiredWithout', 'RequiredWithoutAll'];
    protected $dependentRules = ['After', 'AfterOrEqual', 'Before', 'BeforeOrEqual', 'Confirmed', 'Different', 'ExcludeIf', 'ExcludeUnless', 'ExcludeWithout', 'Gt', 'Gte', 'Lt', 'Lte', 'AcceptedIf', 'DeclinedIf', 'RequiredIf', 'RequiredUnless', 'RequiredWith', 'RequiredWithAll', 'RequiredWithout', 'RequiredWithoutAll', 'Prohibited', 'ProhibitedIf', 'ProhibitedUnless', 'Prohibits', 'Same', 'Unique'];
    protected $excludeRules = ['Exclude', 'ExcludeIf', 'ExcludeUnless', 'ExcludeWithout'];
    protected $sizeRules = ['Size', 'Between', 'Min', 'Max', 'Gt', 'Lt', 'Gte', 'Lte'];
    protected $numericRules = ['Numeric', 'Integer'];
    protected $dotPlaceholder;
    protected $exception = ValidationException::class;
    public function __construct(Translator $translator, array $data, array $rules, array $messages = [], array $customAttributes = [])
    {
        $this->dotPlaceholder = Str::random();
        $this->initialRules = $rules;
        $this->translator = $translator;
        $this->customMessages = $messages;
        $this->data = $this->parseData($data);
        $this->customAttributes = $customAttributes;
        $this->setRules($rules);
    }
    public function parseData(array $data)
    {
        $newData = [];
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $value = $this->parseData($value);
            }
            $key = str_replace(['.', '*'], [$this->dotPlaceholder, '__asterisk__'], $key);
            $newData[$key] = $value;
        }
        return $newData;
    }
    protected function replacePlaceholders($data)
    {
        $originalData = [];
        foreach ($data as $key => $value) {
            $originalData[$this->replacePlaceholderInString($key)] = is_array($value) ? $this->replacePlaceholders($value) : $value;
        }
        return $originalData;
    }
    protected function replacePlaceholderInString(string $value)
    {
        return str_replace([$this->dotPlaceholder, '__asterisk__'], ['.', '*'], $value);
    }
    public function after($callback)
    {
        $this->after[] = function () use($callback) {
            return $callback($this);
        };
        return $this;
    }
    public function passes()
    {
        $this->messages = new MessageBag();
        [$this->distinctValues, $this->failedRules] = [[], []];
        foreach ($this->rules as $attribute => $rules) {
            if ($this->shouldBeExcluded($attribute)) {
                $this->removeAttribute($attribute);
                continue;
            }
            if ($this->stopOnFirstFailure && $this->messages->isNotEmpty()) {
                break;
            }
            foreach ($rules as $rule) {
                $this->validateAttribute($attribute, $rule);
                if ($this->shouldBeExcluded($attribute)) {
                    $this->removeAttribute($attribute);
                    break;
                }
                if ($this->shouldStopValidating($attribute)) {
                    break;
                }
            }
        }
        foreach ($this->after as $after) {
            $after();
        }
        return $this->messages->isEmpty();
    }
    public function fails()
    {
        return !$this->passes();
    }
    protected function shouldBeExcluded($attribute)
    {
        foreach ($this->excludeAttributes as $excludeAttribute) {
            if ($attribute === $excludeAttribute || Str::startsWith($attribute, $excludeAttribute . '.')) {
                return true;
            }
        }
        return false;
    }
    protected function removeAttribute($attribute)
    {
        Arr::forget($this->data, $attribute);
        Arr::forget($this->rules, $attribute);
    }
    public function validate()
    {
        throw_if($this->fails(), $this->exception, $this);
        return $this->validated();
    }
    public function validateWithBag(string $errorBag)
    {
        try {
            return $this->validate();
        } catch (ValidationException $e) {
            $e->errorBag = $errorBag;
            throw $e;
        }
    }
    public function safe(array $keys = null)
    {
        return is_array($keys) ? (new ValidatedInput($this->validated()))->only($keys) : new ValidatedInput($this->validated());
    }
    public function validated()
    {
        throw_if($this->invalid(), $this->exception, $this);
        $results = [];
        $missingValue = new stdClass();
        foreach ($this->getRules() as $key => $rules) {
            if ($this->excludeUnvalidatedArrayKeys && in_array('array', $rules) && !empty(preg_grep('/^' . preg_quote($key, '/') . '\\.+/', array_keys($this->getRules())))) {
                continue;
            }
            $value = data_get($this->getData(), $key, $missingValue);
            if ($value !== $missingValue) {
                Arr::set($results, $key, $value);
            }
        }
        return $this->replacePlaceholders($results);
    }
    protected function validateAttribute($attribute, $rule)
    {
        $this->currentRule = $rule;
        [$rule, $parameters] = ValidationRuleParser::parse($rule);
        if ($rule === '') {
            return;
        }
        if ($this->dependsOnOtherFields($rule)) {
            $parameters = $this->replaceDotInParameters($parameters);
            if ($keys = $this->getExplicitKeys($attribute)) {
                $parameters = $this->replaceAsterisksInParameters($parameters, $keys);
            }
        }
        $value = $this->getValue($attribute);
        if ($value instanceof UploadedFile && !$value->isValid() && $this->hasRule($attribute, array_merge($this->fileRules, $this->implicitRules))) {
            return $this->addFailure($attribute, 'uploaded', []);
        }
        $validatable = $this->isValidatable($rule, $attribute, $value);
        if ($rule instanceof RuleContract) {
            return $validatable ? $this->validateUsingCustomRule($attribute, $value, $rule) : null;
        }
        $method = "validate{$rule}";
        if ($validatable && !$this->{$method}($attribute, $value, $parameters, $this)) {
            $this->addFailure($attribute, $rule, $parameters);
        }
    }
    protected function dependsOnOtherFields($rule)
    {
        return in_array($rule, $this->dependentRules);
    }
    protected function getExplicitKeys($attribute)
    {
        $pattern = str_replace('\\*', '([^\\.]+)', preg_quote($this->getPrimaryAttribute($attribute), '/'));
        if (preg_match('/^' . $pattern . '/', $attribute, $keys)) {
            array_shift($keys);
            return $keys;
        }
        return [];
    }
    protected function getPrimaryAttribute($attribute)
    {
        foreach ($this->implicitAttributes as $unparsed => $parsed) {
            if (in_array($attribute, $parsed, true)) {
                return $unparsed;
            }
        }
        return $attribute;
    }
    protected function replaceDotInParameters(array $parameters)
    {
        return array_map(function ($field) {
            return str_replace('\\.', $this->dotPlaceholder, $field);
        }, $parameters);
    }
    protected function replaceAsterisksInParameters(array $parameters, array $keys)
    {
        return array_map(function ($field) use($keys) {
            return vsprintf(str_replace('*', '%s', $field), $keys);
        }, $parameters);
    }
    protected function isValidatable($rule, $attribute, $value)
    {
        if (in_array($rule, $this->excludeRules)) {
            return true;
        }
        return $this->presentOrRuleIsImplicit($rule, $attribute, $value) && $this->passesOptionalCheck($attribute) && $this->isNotNullIfMarkedAsNullable($rule, $attribute) && $this->hasNotFailedPreviousRuleIfPresenceRule($rule, $attribute);
    }
    protected function presentOrRuleIsImplicit($rule, $attribute, $value)
    {
        if (is_string($value) && trim($value) === '') {
            return $this->isImplicit($rule);
        }
        return $this->validatePresent($attribute, $value) || $this->isImplicit($rule);
    }
    protected function isImplicit($rule)
    {
        return $rule instanceof ImplicitRule || in_array($rule, $this->implicitRules);
    }
    protected function passesOptionalCheck($attribute)
    {
        if (!$this->hasRule($attribute, ['Sometimes'])) {
            return true;
        }
        $data = ValidationData::initializeAndGatherData($attribute, $this->data);
        return array_key_exists($attribute, $data) || array_key_exists($attribute, $this->data);
    }
    protected function isNotNullIfMarkedAsNullable($rule, $attribute)
    {
        if ($this->isImplicit($rule) || !$this->hasRule($attribute, ['Nullable'])) {
            return true;
        }
        return !is_null(Arr::get($this->data, $attribute, 0));
    }
    protected function hasNotFailedPreviousRuleIfPresenceRule($rule, $attribute)
    {
        return in_array($rule, ['Unique', 'Exists']) ? !$this->messages->has($attribute) : true;
    }
    protected function validateUsingCustomRule($attribute, $value, $rule)
    {
        $attribute = $this->replacePlaceholderInString($attribute);
        $value = is_array($value) ? $this->replacePlaceholders($value) : $value;
        if ($rule instanceof ValidatorAwareRule) {
            $rule->setValidator($this);
        }
        if ($rule instanceof DataAwareRule) {
            $rule->setData($this->data);
        }
        if (!$rule->passes($attribute, $value)) {
            $this->failedRules[$attribute][get_class($rule)] = [];
            $messages = $rule->message();
            $messages = $messages ? (array) $messages : [get_class($rule)];
            foreach ($messages as $message) {
                $this->messages->add($attribute, $this->makeReplacements($message, $attribute, get_class($rule), []));
            }
        }
    }
    protected function shouldStopValidating($attribute)
    {
        $cleanedAttribute = $this->replacePlaceholderInString($attribute);
        if ($this->hasRule($attribute, ['Bail'])) {
            return $this->messages->has($cleanedAttribute);
        }
        if (isset($this->failedRules[$cleanedAttribute]) && array_key_exists('uploaded', $this->failedRules[$cleanedAttribute])) {
            return true;
        }
        return $this->hasRule($attribute, $this->implicitRules) && isset($this->failedRules[$cleanedAttribute]) && array_intersect(array_keys($this->failedRules[$cleanedAttribute]), $this->implicitRules);
    }
    public function addFailure($attribute, $rule, $parameters = [])
    {
        if (!$this->messages) {
            $this->passes();
        }
        $attributeWithPlaceholders = $attribute;
        $attribute = str_replace([$this->dotPlaceholder, '__asterisk__'], ['.', '*'], $attribute);
        if (in_array($rule, $this->excludeRules)) {
            return $this->excludeAttribute($attribute);
        }
        $this->messages->add($attribute, $this->makeReplacements($this->getMessage($attributeWithPlaceholders, $rule), $attribute, $rule, $parameters));
        $this->failedRules[$attribute][$rule] = $parameters;
    }
    protected function excludeAttribute(string $attribute)
    {
        $this->excludeAttributes[] = $attribute;
        $this->excludeAttributes = array_unique($this->excludeAttributes);
    }
    public function valid()
    {
        if (!$this->messages) {
            $this->passes();
        }
        return array_diff_key($this->data, $this->attributesThatHaveMessages());
    }
    public function invalid()
    {
        if (!$this->messages) {
            $this->passes();
        }
        $invalid = array_intersect_key($this->data, $this->attributesThatHaveMessages());
        $result = [];
        $failed = Arr::only(Arr::dot($invalid), array_keys($this->failed()));
        foreach ($failed as $key => $failure) {
            Arr::set($result, $key, $failure);
        }
        return $result;
    }
    protected function attributesThatHaveMessages()
    {
        return collect($this->messages()->toArray())->map(function ($message, $key) {
            return explode('.', $key)[0];
        })->unique()->flip()->all();
    }
    public function failed()
    {
        return $this->failedRules;
    }
    public function messages()
    {
        if (!$this->messages) {
            $this->passes();
        }
        return $this->messages;
    }
    public function errors()
    {
        return $this->messages();
    }
    public function getMessageBag()
    {
        return $this->messages();
    }
    public function hasRule($attribute, $rules)
    {
        return !is_null($this->getRule($attribute, $rules));
    }
    protected function getRule($attribute, $rules)
    {
        if (!array_key_exists($attribute, $this->rules)) {
            return;
        }
        $rules = (array) $rules;
        foreach ($this->rules[$attribute] as $rule) {
            [$rule, $parameters] = ValidationRuleParser::parse($rule);
            if (in_array($rule, $rules)) {
                return [$rule, $parameters];
            }
        }
    }
    public function attributes()
    {
        return $this->getData();
    }
    public function getData()
    {
        return $this->data;
    }
    public function setData(array $data)
    {
        $this->data = $this->parseData($data);
        $this->setRules($this->initialRules);
        return $this;
    }
    protected function getValue($attribute)
    {
        return Arr::get($this->data, $attribute);
    }
    public function getRules()
    {
        return $this->rules;
    }
    public function setRules(array $rules)
    {
        $rules = collect($rules)->mapWithKeys(function ($value, $key) {
            return [str_replace('\\.', $this->dotPlaceholder, $key) => $value];
        })->toArray();
        $this->initialRules = $rules;
        $this->rules = [];
        $this->addRules($rules);
        return $this;
    }
    public function addRules($rules)
    {
        $response = (new ValidationRuleParser($this->data))->explode(ValidationRuleParser::filterConditionalRules($rules, $this->data));
        $this->rules = array_merge_recursive($this->rules, $response->rules);
        $this->implicitAttributes = array_merge($this->implicitAttributes, $response->implicitAttributes);
    }
    public function sometimes($attribute, $rules, callable $callback)
    {
        $payload = new Fluent($this->data);
        foreach ((array) $attribute as $key) {
            $response = (new ValidationRuleParser($this->data))->explode([$key => $rules]);
            $this->implicitAttributes = array_merge($response->implicitAttributes, $this->implicitAttributes);
            foreach ($response->rules as $ruleKey => $ruleValue) {
                if ($callback($payload, $this->dataForSometimesIteration($ruleKey, !Str::endsWith($key, '.*')))) {
                    $this->addRules([$ruleKey => $ruleValue]);
                }
            }
        }
        return $this;
    }
    private function dataForSometimesIteration(string $attribute, $removeLastSegmentOfAttribute)
    {
        $lastSegmentOfAttribute = strrchr($attribute, '.');
        $attribute = $lastSegmentOfAttribute && $removeLastSegmentOfAttribute ? Str::replaceLast($lastSegmentOfAttribute, '', $attribute) : $attribute;
        return is_array($data = data_get($this->data, $attribute)) ? new Fluent($data) : $data;
    }
    public function stopOnFirstFailure($stopOnFirstFailure = true)
    {
        $this->stopOnFirstFailure = $stopOnFirstFailure;
        return $this;
    }
    public function addExtensions(array $extensions)
    {
        if ($extensions) {
            $keys = array_map([Str::class, 'snake'], array_keys($extensions));
            $extensions = array_combine($keys, array_values($extensions));
        }
        $this->extensions = array_merge($this->extensions, $extensions);
    }
    public function addImplicitExtensions(array $extensions)
    {
        $this->addExtensions($extensions);
        foreach ($extensions as $rule => $extension) {
            $this->implicitRules[] = Str::studly($rule);
        }
    }
    public function addDependentExtensions(array $extensions)
    {
        $this->addExtensions($extensions);
        foreach ($extensions as $rule => $extension) {
            $this->dependentRules[] = Str::studly($rule);
        }
    }
    public function addExtension($rule, $extension)
    {
        $this->extensions[Str::snake($rule)] = $extension;
    }
    public function addImplicitExtension($rule, $extension)
    {
        $this->addExtension($rule, $extension);
        $this->implicitRules[] = Str::studly($rule);
    }
    public function addDependentExtension($rule, $extension)
    {
        $this->addExtension($rule, $extension);
        $this->dependentRules[] = Str::studly($rule);
    }
    public function addReplacers(array $replacers)
    {
        if ($replacers) {
            $keys = array_map([Str::class, 'snake'], array_keys($replacers));
            $replacers = array_combine($keys, array_values($replacers));
        }
        $this->replacers = array_merge($this->replacers, $replacers);
    }
    public function addReplacer($rule, $replacer)
    {
        $this->replacers[Str::snake($rule)] = $replacer;
    }
    public function setCustomMessages(array $messages)
    {
        $this->customMessages = array_merge($this->customMessages, $messages);
        return $this;
    }
    public function setAttributeNames(array $attributes)
    {
        $this->customAttributes = $attributes;
        return $this;
    }
    public function addCustomAttributes(array $customAttributes)
    {
        $this->customAttributes = array_merge($this->customAttributes, $customAttributes);
        return $this;
    }
    public function setImplicitAttributesFormatter(callable $formatter = null)
    {
        $this->implicitAttributesFormatter = $formatter;
        return $this;
    }
    public function setValueNames(array $values)
    {
        $this->customValues = $values;
        return $this;
    }
    public function addCustomValues(array $customValues)
    {
        $this->customValues = array_merge($this->customValues, $customValues);
        return $this;
    }
    public function setFallbackMessages(array $messages)
    {
        $this->fallbackMessages = $messages;
    }
    public function getPresenceVerifier($connection = null)
    {
        if (!isset($this->presenceVerifier)) {
            throw new RuntimeException('Presence verifier has not been set.');
        }
        if ($this->presenceVerifier instanceof DatabasePresenceVerifierInterface) {
            $this->presenceVerifier->setConnection($connection);
        }
        return $this->presenceVerifier;
    }
    public function setPresenceVerifier(PresenceVerifierInterface $presenceVerifier)
    {
        $this->presenceVerifier = $presenceVerifier;
    }
    public function setException($exception)
    {
        if (!is_a($exception, ValidationException::class, true)) {
            throw new InvalidArgumentException(sprintf('Exception [%s] is invalid. It must extend [%s].', $exception, ValidationException::class));
        }
        $this->exception = $exception;
        return $this;
    }
    public function getTranslator()
    {
        return $this->translator;
    }
    public function setTranslator(Translator $translator)
    {
        $this->translator = $translator;
    }
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }
    protected function callExtension($rule, $parameters)
    {
        $callback = $this->extensions[$rule];
        if (is_callable($callback)) {
            return $callback(...array_values($parameters));
        } elseif (is_string($callback)) {
            return $this->callClassBasedExtension($callback, $parameters);
        }
    }
    protected function callClassBasedExtension($callback, $parameters)
    {
        [$class, $method] = Str::parseCallback($callback, 'validate');
        return $this->container->make($class)->{$method}(...array_values($parameters));
    }
    public function __call($method, $parameters)
    {
        $rule = Str::snake(substr($method, 8));
        if (isset($this->extensions[$rule])) {
            return $this->callExtension($rule, $parameters);
        }
        throw new BadMethodCallException(sprintf('Method %s::%s does not exist.', static::class, $method));
    }
}
}

namespace Illuminate\Validation {
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Contracts\Validation\UncompromisedVerifier;
use Illuminate\Http\Client\Factory as HttpFactory;
use Illuminate\Support\ServiceProvider;
class ValidationServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register()
    {
        $this->registerPresenceVerifier();
        $this->registerUncompromisedVerifier();
        $this->registerValidationFactory();
    }
    protected function registerValidationFactory()
    {
        $this->app->singleton('validator', function ($app) {
            $validator = new Factory($app['translator'], $app);
            if (isset($app['db'], $app['validation.presence'])) {
                $validator->setPresenceVerifier($app['validation.presence']);
            }
            return $validator;
        });
    }
    protected function registerPresenceVerifier()
    {
        $this->app->singleton('validation.presence', function ($app) {
            return new DatabasePresenceVerifier($app['db']);
        });
    }
    protected function registerUncompromisedVerifier()
    {
        $this->app->singleton(UncompromisedVerifier::class, function ($app) {
            return new NotPwnedVerifier($app[HttpFactory::class]);
        });
    }
    public function provides()
    {
        return ['validator', 'validation.presence'];
    }
}
}

namespace Illuminate\Validation {
use Closure;
use Illuminate\Database\ConnectionResolverInterface;
use Illuminate\Support\Str;
class DatabasePresenceVerifier implements DatabasePresenceVerifierInterface
{
    protected $db;
    protected $connection;
    public function __construct(ConnectionResolverInterface $db)
    {
        $this->db = $db;
    }
    public function getCount($collection, $column, $value, $excludeId = null, $idColumn = null, array $extra = [])
    {
        $query = $this->table($collection)->where($column, '=', $value);
        if (!is_null($excludeId) && $excludeId !== 'NULL') {
            $query->where($idColumn ?: 'id', '<>', $excludeId);
        }
        return $this->addConditions($query, $extra)->count();
    }
    public function getMultiCount($collection, $column, array $values, array $extra = [])
    {
        $query = $this->table($collection)->whereIn($column, $values);
        return $this->addConditions($query, $extra)->distinct()->count($column);
    }
    protected function addConditions($query, $conditions)
    {
        foreach ($conditions as $key => $value) {
            if ($value instanceof Closure) {
                $query->where(function ($query) use($value) {
                    $value($query);
                });
            } else {
                $this->addWhere($query, $key, $value);
            }
        }
        return $query;
    }
    protected function addWhere($query, $key, $extraValue)
    {
        if ($extraValue === 'NULL') {
            $query->whereNull($key);
        } elseif ($extraValue === 'NOT_NULL') {
            $query->whereNotNull($key);
        } elseif (Str::startsWith($extraValue, '!')) {
            $query->where($key, '!=', mb_substr($extraValue, 1));
        } else {
            $query->where($key, $extraValue);
        }
    }
    protected function table($table)
    {
        return $this->db->connection($this->connection)->table($table)->useWritePdo();
    }
    public function setConnection($connection)
    {
        $this->connection = $connection;
    }
}
}

namespace Illuminate\Validation {
use Closure;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\Factory as FactoryContract;
use Illuminate\Support\Str;
class Factory implements FactoryContract
{
    protected $translator;
    protected $verifier;
    protected $container;
    protected $extensions = [];
    protected $implicitExtensions = [];
    protected $dependentExtensions = [];
    protected $replacers = [];
    protected $fallbackMessages = [];
    protected $excludeUnvalidatedArrayKeys;
    protected $resolver;
    public function __construct(Translator $translator, Container $container = null)
    {
        $this->container = $container;
        $this->translator = $translator;
    }
    public function make(array $data, array $rules, array $messages = [], array $customAttributes = [])
    {
        $validator = $this->resolve($data, $rules, $messages, $customAttributes);
        if (!is_null($this->verifier)) {
            $validator->setPresenceVerifier($this->verifier);
        }
        if (!is_null($this->container)) {
            $validator->setContainer($this->container);
        }
        $validator->excludeUnvalidatedArrayKeys = $this->excludeUnvalidatedArrayKeys;
        $this->addExtensions($validator);
        return $validator;
    }
    public function validate(array $data, array $rules, array $messages = [], array $customAttributes = [])
    {
        return $this->make($data, $rules, $messages, $customAttributes)->validate();
    }
    protected function resolve(array $data, array $rules, array $messages, array $customAttributes)
    {
        if (is_null($this->resolver)) {
            return new Validator($this->translator, $data, $rules, $messages, $customAttributes);
        }
        return call_user_func($this->resolver, $this->translator, $data, $rules, $messages, $customAttributes);
    }
    protected function addExtensions(Validator $validator)
    {
        $validator->addExtensions($this->extensions);
        $validator->addImplicitExtensions($this->implicitExtensions);
        $validator->addDependentExtensions($this->dependentExtensions);
        $validator->addReplacers($this->replacers);
        $validator->setFallbackMessages($this->fallbackMessages);
    }
    public function extend($rule, $extension, $message = null)
    {
        $this->extensions[$rule] = $extension;
        if ($message) {
            $this->fallbackMessages[Str::snake($rule)] = $message;
        }
    }
    public function extendImplicit($rule, $extension, $message = null)
    {
        $this->implicitExtensions[$rule] = $extension;
        if ($message) {
            $this->fallbackMessages[Str::snake($rule)] = $message;
        }
    }
    public function extendDependent($rule, $extension, $message = null)
    {
        $this->dependentExtensions[$rule] = $extension;
        if ($message) {
            $this->fallbackMessages[Str::snake($rule)] = $message;
        }
    }
    public function replacer($rule, $replacer)
    {
        $this->replacers[$rule] = $replacer;
    }
    public function excludeUnvalidatedArrayKeys()
    {
        $this->excludeUnvalidatedArrayKeys = true;
    }
    public function resolver(Closure $resolver)
    {
        $this->resolver = $resolver;
    }
    public function getTranslator()
    {
        return $this->translator;
    }
    public function getPresenceVerifier()
    {
        return $this->verifier;
    }
    public function setPresenceVerifier(PresenceVerifierInterface $presenceVerifier)
    {
        $this->verifier = $presenceVerifier;
    }
    public function getContainer()
    {
        return $this->container;
    }
    public function setContainer(Container $container)
    {
        $this->container = $container;
        return $this;
    }
}
}

namespace Illuminate\Validation {
trait ValidatesWhenResolvedTrait
{
    public function validateResolved()
    {
        $this->prepareForValidation();
        if (!$this->passesAuthorization()) {
            $this->failedAuthorization();
        }
        $instance = $this->getValidatorInstance();
        if ($instance->fails()) {
            $this->failedValidation($instance);
        }
        $this->passedValidation();
    }
    protected function prepareForValidation()
    {
    }
    protected function getValidatorInstance()
    {
        return $this->validator();
    }
    protected function passedValidation()
    {
    }
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator);
    }
    protected function passesAuthorization()
    {
        if (method_exists($this, 'authorize')) {
            return $this->authorize();
        }
        return true;
    }
    protected function failedAuthorization()
    {
        throw new UnauthorizedException();
    }
}
}

namespace Illuminate\Validation {
interface PresenceVerifierInterface
{
    public function getCount($collection, $column, $value, $excludeId = null, $idColumn = null, array $extra = []);
    public function getMultiCount($collection, $column, array $values, array $extra = []);
}
}

namespace Illuminate\Validation {
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
class ValidationException extends Exception
{
    public $validator;
    public $response;
    public $status = 422;
    public $errorBag;
    public $redirectTo;
    public function __construct($validator, $response = null, $errorBag = 'default')
    {
        parent::__construct('The given data was invalid.');
        $this->response = $response;
        $this->errorBag = $errorBag;
        $this->validator = $validator;
    }
    public static function withMessages(array $messages)
    {
        return new static(tap(ValidatorFacade::make([], []), function ($validator) use($messages) {
            foreach ($messages as $key => $value) {
                foreach (Arr::wrap($value) as $message) {
                    $validator->errors()->add($key, $message);
                }
            }
        }));
    }
    public function errors()
    {
        return $this->validator->errors()->messages();
    }
    public function status($status)
    {
        $this->status = $status;
        return $this;
    }
    public function errorBag($errorBag)
    {
        $this->errorBag = $errorBag;
        return $this;
    }
    public function redirectTo($url)
    {
        $this->redirectTo = $url;
        return $this;
    }
    public function getResponse()
    {
        return $this->response;
    }
}
}

namespace Illuminate\Pagination {
use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Traits\ForwardsCalls;
use Illuminate\Support\Traits\Tappable;
abstract class AbstractPaginator implements Htmlable
{
    use ForwardsCalls, Tappable;
    protected $items;
    protected $perPage;
    protected $currentPage;
    protected $path = '/';
    protected $query = [];
    protected $fragment;
    protected $pageName = 'page';
    public $onEachSide = 3;
    protected $options;
    protected static $currentPathResolver;
    protected static $currentPageResolver;
    protected static $queryStringResolver;
    protected static $viewFactoryResolver;
    public static $defaultView = 'pagination::tailwind';
    public static $defaultSimpleView = 'pagination::simple-tailwind';
    protected function isValidPageNumber($page)
    {
        return $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false;
    }
    public function previousPageUrl()
    {
        if ($this->currentPage() > 1) {
            return $this->url($this->currentPage() - 1);
        }
    }
    public function getUrlRange($start, $end)
    {
        return collect(range($start, $end))->mapWithKeys(function ($page) {
            return [$page => $this->url($page)];
        })->all();
    }
    public function url($page)
    {
        if ($page <= 0) {
            $page = 1;
        }
        $parameters = [$this->pageName => $page];
        if (count($this->query) > 0) {
            $parameters = array_merge($this->query, $parameters);
        }
        return $this->path() . (Str::contains($this->path(), '?') ? '&' : '?') . Arr::query($parameters) . $this->buildFragment();
    }
    public function fragment($fragment = null)
    {
        if (is_null($fragment)) {
            return $this->fragment;
        }
        $this->fragment = $fragment;
        return $this;
    }
    public function appends($key, $value = null)
    {
        if (is_null($key)) {
            return $this;
        }
        if (is_array($key)) {
            return $this->appendArray($key);
        }
        return $this->addQuery($key, $value);
    }
    protected function appendArray(array $keys)
    {
        foreach ($keys as $key => $value) {
            $this->addQuery($key, $value);
        }
        return $this;
    }
    public function withQueryString()
    {
        if (isset(static::$queryStringResolver)) {
            return $this->appends(call_user_func(static::$queryStringResolver));
        }
        return $this;
    }
    protected function addQuery($key, $value)
    {
        if ($key !== $this->pageName) {
            $this->query[$key] = $value;
        }
        return $this;
    }
    protected function buildFragment()
    {
        return $this->fragment ? '#' . $this->fragment : '';
    }
    public function loadMorph($relation, $relations)
    {
        $this->getCollection()->loadMorph($relation, $relations);
        return $this;
    }
    public function loadMorphCount($relation, $relations)
    {
        $this->getCollection()->loadMorphCount($relation, $relations);
        return $this;
    }
    public function items()
    {
        return $this->items->all();
    }
    public function firstItem()
    {
        return count($this->items) > 0 ? ($this->currentPage - 1) * $this->perPage + 1 : null;
    }
    public function lastItem()
    {
        return count($this->items) > 0 ? $this->firstItem() + $this->count() - 1 : null;
    }
    public function through(callable $callback)
    {
        $this->items->transform($callback);
        return $this;
    }
    public function perPage()
    {
        return $this->perPage;
    }
    public function hasPages()
    {
        return $this->currentPage() != 1 || $this->hasMorePages();
    }
    public function onFirstPage()
    {
        return $this->currentPage() <= 1;
    }
    public function onLastPage()
    {
        return !$this->hasMorePages();
    }
    public function currentPage()
    {
        return $this->currentPage;
    }
    public function getPageName()
    {
        return $this->pageName;
    }
    public function setPageName($name)
    {
        $this->pageName = $name;
        return $this;
    }
    public function withPath($path)
    {
        return $this->setPath($path);
    }
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }
    public function onEachSide($count)
    {
        $this->onEachSide = $count;
        return $this;
    }
    public function path()
    {
        return $this->path;
    }
    public static function resolveCurrentPath($default = '/')
    {
        if (isset(static::$currentPathResolver)) {
            return call_user_func(static::$currentPathResolver);
        }
        return $default;
    }
    public static function currentPathResolver(Closure $resolver)
    {
        static::$currentPathResolver = $resolver;
    }
    public static function resolveCurrentPage($pageName = 'page', $default = 1)
    {
        if (isset(static::$currentPageResolver)) {
            return (int) call_user_func(static::$currentPageResolver, $pageName);
        }
        return $default;
    }
    public static function currentPageResolver(Closure $resolver)
    {
        static::$currentPageResolver = $resolver;
    }
    public static function resolveQueryString($default = null)
    {
        if (isset(static::$queryStringResolver)) {
            return (static::$queryStringResolver)();
        }
        return $default;
    }
    public static function queryStringResolver(Closure $resolver)
    {
        static::$queryStringResolver = $resolver;
    }
    public static function viewFactory()
    {
        return call_user_func(static::$viewFactoryResolver);
    }
    public static function viewFactoryResolver(Closure $resolver)
    {
        static::$viewFactoryResolver = $resolver;
    }
    public static function defaultView($view)
    {
        static::$defaultView = $view;
    }
    public static function defaultSimpleView($view)
    {
        static::$defaultSimpleView = $view;
    }
    public static function useTailwind()
    {
        static::defaultView('pagination::tailwind');
        static::defaultSimpleView('pagination::simple-tailwind');
    }
    public static function useBootstrap()
    {
        static::defaultView('pagination::bootstrap-4');
        static::defaultSimpleView('pagination::simple-bootstrap-4');
    }
    public static function useBootstrapThree()
    {
        static::defaultView('pagination::default');
        static::defaultSimpleView('pagination::simple-default');
    }
    public function getIterator()
    {
        return $this->items->getIterator();
    }
    public function isEmpty()
    {
        return $this->items->isEmpty();
    }
    public function isNotEmpty()
    {
        return $this->items->isNotEmpty();
    }
    public function count()
    {
        return $this->items->count();
    }
    public function getCollection()
    {
        return $this->items;
    }
    public function setCollection(Collection $collection)
    {
        $this->items = $collection;
        return $this;
    }
    public function getOptions()
    {
        return $this->options;
    }
    public function offsetExists($key)
    {
        return $this->items->has($key);
    }
    public function offsetGet($key)
    {
        return $this->items->get($key);
    }
    public function offsetSet($key, $value)
    {
        $this->items->put($key, $value);
    }
    public function offsetUnset($key)
    {
        $this->items->forget($key);
    }
    public function toHtml()
    {
        return (string) $this->render();
    }
    public function __call($method, $parameters)
    {
        return $this->forwardCallTo($this->getCollection(), $method, $parameters);
    }
    public function __toString()
    {
        return (string) $this->render();
    }
}
}

namespace Illuminate\Pagination {
use ArrayAccess;
use Countable;
use Illuminate\Contracts\Pagination\Paginator as PaginatorContract;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Collection;
use IteratorAggregate;
use JsonSerializable;
class Paginator extends AbstractPaginator implements Arrayable, ArrayAccess, Countable, IteratorAggregate, Jsonable, JsonSerializable, PaginatorContract
{
    protected $hasMore;
    public function __construct($items, $perPage, $currentPage = null, array $options = [])
    {
        $this->options = $options;
        foreach ($options as $key => $value) {
            $this->{$key} = $value;
        }
        $this->perPage = $perPage;
        $this->currentPage = $this->setCurrentPage($currentPage);
        $this->path = $this->path !== '/' ? rtrim($this->path, '/') : $this->path;
        $this->setItems($items);
    }
    protected function setCurrentPage($currentPage)
    {
        $currentPage = $currentPage ?: static::resolveCurrentPage();
        return $this->isValidPageNumber($currentPage) ? (int) $currentPage : 1;
    }
    protected function setItems($items)
    {
        $this->items = $items instanceof Collection ? $items : Collection::make($items);
        $this->hasMore = $this->items->count() > $this->perPage;
        $this->items = $this->items->slice(0, $this->perPage);
    }
    public function nextPageUrl()
    {
        if ($this->hasMorePages()) {
            return $this->url($this->currentPage() + 1);
        }
    }
    public function links($view = null, $data = [])
    {
        return $this->render($view, $data);
    }
    public function render($view = null, $data = [])
    {
        return static::viewFactory()->make($view ?: static::$defaultSimpleView, array_merge($data, ['paginator' => $this]));
    }
    public function hasMorePagesWhen($hasMore = true)
    {
        $this->hasMore = $hasMore;
        return $this;
    }
    public function hasMorePages()
    {
        return $this->hasMore;
    }
    public function toArray()
    {
        return ['current_page' => $this->currentPage(), 'data' => $this->items->toArray(), 'first_page_url' => $this->url(1), 'from' => $this->firstItem(), 'next_page_url' => $this->nextPageUrl(), 'path' => $this->path(), 'per_page' => $this->perPage(), 'prev_page_url' => $this->previousPageUrl(), 'to' => $this->lastItem()];
    }
    public function jsonSerialize()
    {
        return $this->toArray();
    }
    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }
}
}

namespace Illuminate\Hashing {
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
class HashServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register()
    {
        $this->app->singleton('hash', function ($app) {
            return new HashManager($app);
        });
        $this->app->singleton('hash.driver', function ($app) {
            return $app['hash']->driver();
        });
    }
    public function provides()
    {
        return ['hash', 'hash.driver'];
    }
}
}

namespace Illuminate\Hashing {
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use RuntimeException;
class BcryptHasher extends AbstractHasher implements HasherContract
{
    protected $rounds = 10;
    protected $verifyAlgorithm = false;
    public function __construct(array $options = [])
    {
        $this->rounds = $options['rounds'] ?? $this->rounds;
        $this->verifyAlgorithm = $options['verify'] ?? $this->verifyAlgorithm;
    }
    public function make($value, array $options = [])
    {
        $hash = password_hash($value, PASSWORD_BCRYPT, ['cost' => $this->cost($options)]);
        if ($hash === false) {
            throw new RuntimeException('Bcrypt hashing not supported.');
        }
        return $hash;
    }
    public function check($value, $hashedValue, array $options = [])
    {
        if ($this->verifyAlgorithm && $this->info($hashedValue)['algoName'] !== 'bcrypt') {
            throw new RuntimeException('This password does not use the Bcrypt algorithm.');
        }
        return parent::check($value, $hashedValue, $options);
    }
    public function needsRehash($hashedValue, array $options = [])
    {
        return password_needs_rehash($hashedValue, PASSWORD_BCRYPT, ['cost' => $this->cost($options)]);
    }
    public function setRounds($rounds)
    {
        $this->rounds = (int) $rounds;
        return $this;
    }
    protected function cost(array $options = [])
    {
        return $options['rounds'] ?? $this->rounds;
    }
}
}

namespace Illuminate\Config {
use ArrayAccess;
use Illuminate\Contracts\Config\Repository as ConfigContract;
use Illuminate\Support\Arr;
class Repository implements ArrayAccess, ConfigContract
{
    protected $items = [];
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }
    public function has($key)
    {
        return Arr::has($this->items, $key);
    }
    public function get($key, $default = null)
    {
        if (is_array($key)) {
            return $this->getMany($key);
        }
        return Arr::get($this->items, $key, $default);
    }
    public function getMany($keys)
    {
        $config = [];
        foreach ($keys as $key => $default) {
            if (is_numeric($key)) {
                [$key, $default] = [$default, null];
            }
            $config[$key] = Arr::get($this->items, $key, $default);
        }
        return $config;
    }
    public function set($key, $value = null)
    {
        $keys = is_array($key) ? $key : [$key => $value];
        foreach ($keys as $key => $value) {
            Arr::set($this->items, $key, $value);
        }
    }
    public function prepend($key, $value)
    {
        $array = $this->get($key, []);
        array_unshift($array, $value);
        $this->set($key, $array);
    }
    public function push($key, $value)
    {
        $array = $this->get($key, []);
        $array[] = $value;
        $this->set($key, $array);
    }
    public function all()
    {
        return $this->items;
    }
    public function offsetExists($key)
    {
        return $this->has($key);
    }
    public function offsetGet($key)
    {
        return $this->get($key);
    }
    public function offsetSet($key, $value)
    {
        $this->set($key, $value);
    }
    public function offsetUnset($key)
    {
        $this->set($key, null);
    }
}
}

namespace Illuminate\Filesystem {
use ErrorException;
use FilesystemIterator;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Traits\Macroable;
use RuntimeException;
use SplFileObject;
use Symfony\Component\Filesystem\Filesystem as SymfonyFilesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Mime\MimeTypes;
class Filesystem
{
    use Macroable;
    public function exists($path)
    {
        return file_exists($path);
    }
    public function missing($path)
    {
        return !$this->exists($path);
    }
    public function get($path, $lock = false)
    {
        if ($this->isFile($path)) {
            return $lock ? $this->sharedGet($path) : file_get_contents($path);
        }
        throw new FileNotFoundException("File does not exist at path {$path}.");
    }
    public function sharedGet($path)
    {
        $contents = '';
        $handle = fopen($path, 'rb');
        if ($handle) {
            try {
                if (flock($handle, LOCK_SH)) {
                    clearstatcache(true, $path);
                    $contents = fread($handle, $this->size($path) ?: 1);
                    flock($handle, LOCK_UN);
                }
            } finally {
                fclose($handle);
            }
        }
        return $contents;
    }
    public function getRequire($path, array $data = [])
    {
        if ($this->isFile($path)) {
            $__path = $path;
            $__data = $data;
            return (static function () use($__path, $__data) {
                extract($__data, EXTR_SKIP);
                return require $__path;
            })();
        }
        throw new FileNotFoundException("File does not exist at path {$path}.");
    }
    public function requireOnce($path, array $data = [])
    {
        if ($this->isFile($path)) {
            $__path = $path;
            $__data = $data;
            return (static function () use($__path, $__data) {
                extract($__data, EXTR_SKIP);
                return require_once $__path;
            })();
        }
        throw new FileNotFoundException("File does not exist at path {$path}.");
    }
    public function lines($path)
    {
        if (!$this->isFile($path)) {
            throw new FileNotFoundException("File does not exist at path {$path}.");
        }
        return LazyCollection::make(function () use($path) {
            $file = new SplFileObject($path);
            $file->setFlags(SplFileObject::DROP_NEW_LINE);
            while (!$file->eof()) {
                (yield $file->fgets());
            }
        });
    }
    public function hash($path)
    {
        return md5_file($path);
    }
    public function put($path, $contents, $lock = false)
    {
        return file_put_contents($path, $contents, $lock ? LOCK_EX : 0);
    }
    public function replace($path, $content)
    {
        clearstatcache(true, $path);
        $path = realpath($path) ?: $path;
        $tempPath = tempnam(dirname($path), basename($path));
        chmod($tempPath, 0777 - umask());
        file_put_contents($tempPath, $content);
        rename($tempPath, $path);
    }
    public function replaceInFile($search, $replace, $path)
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }
    public function prepend($path, $data)
    {
        if ($this->exists($path)) {
            return $this->put($path, $data . $this->get($path));
        }
        return $this->put($path, $data);
    }
    public function append($path, $data)
    {
        return file_put_contents($path, $data, FILE_APPEND);
    }
    public function chmod($path, $mode = null)
    {
        if ($mode) {
            return chmod($path, $mode);
        }
        return substr(sprintf('%o', fileperms($path)), -4);
    }
    public function delete($paths)
    {
        $paths = is_array($paths) ? $paths : func_get_args();
        $success = true;
        foreach ($paths as $path) {
            try {
                if (@unlink($path)) {
                    clearstatcache(false, $path);
                } else {
                    $success = false;
                }
            } catch (ErrorException $e) {
                $success = false;
            }
        }
        return $success;
    }
    public function move($path, $target)
    {
        return rename($path, $target);
    }
    public function copy($path, $target)
    {
        return copy($path, $target);
    }
    public function link($target, $link)
    {
        if (!windows_os()) {
            return symlink($target, $link);
        }
        $mode = $this->isDirectory($target) ? 'J' : 'H';
        exec("mklink /{$mode} " . escapeshellarg($link) . ' ' . escapeshellarg($target));
    }
    public function relativeLink($target, $link)
    {
        if (!class_exists(SymfonyFilesystem::class)) {
            throw new RuntimeException('To enable support for relative links, please install the symfony/filesystem package.');
        }
        $relativeTarget = (new SymfonyFilesystem())->makePathRelative($target, dirname($link));
        $this->link($relativeTarget, $link);
    }
    public function name($path)
    {
        return pathinfo($path, PATHINFO_FILENAME);
    }
    public function basename($path)
    {
        return pathinfo($path, PATHINFO_BASENAME);
    }
    public function dirname($path)
    {
        return pathinfo($path, PATHINFO_DIRNAME);
    }
    public function extension($path)
    {
        return pathinfo($path, PATHINFO_EXTENSION);
    }
    public function guessExtension($path)
    {
        if (!class_exists(MimeTypes::class)) {
            throw new RuntimeException('To enable support for guessing extensions, please install the symfony/mime package.');
        }
        return (new MimeTypes())->getExtensions($this->mimeType($path))[0] ?? null;
    }
    public function type($path)
    {
        return filetype($path);
    }
    public function mimeType($path)
    {
        return finfo_file(finfo_open(FILEINFO_MIME_TYPE), $path);
    }
    public function size($path)
    {
        return filesize($path);
    }
    public function lastModified($path)
    {
        return filemtime($path);
    }
    public function isDirectory($directory)
    {
        return is_dir($directory);
    }
    public function isReadable($path)
    {
        return is_readable($path);
    }
    public function isWritable($path)
    {
        return is_writable($path);
    }
    public function isFile($file)
    {
        return is_file($file);
    }
    public function glob($pattern, $flags = 0)
    {
        return glob($pattern, $flags);
    }
    public function files($directory, $hidden = false)
    {
        return iterator_to_array(Finder::create()->files()->ignoreDotFiles(!$hidden)->in($directory)->depth(0)->sortByName(), false);
    }
    public function allFiles($directory, $hidden = false)
    {
        return iterator_to_array(Finder::create()->files()->ignoreDotFiles(!$hidden)->in($directory)->sortByName(), false);
    }
    public function directories($directory)
    {
        $directories = [];
        foreach (Finder::create()->in($directory)->directories()->depth(0)->sortByName() as $dir) {
            $directories[] = $dir->getPathname();
        }
        return $directories;
    }
    public function ensureDirectoryExists($path, $mode = 0755, $recursive = true)
    {
        if (!$this->isDirectory($path)) {
            $this->makeDirectory($path, $mode, $recursive);
        }
    }
    public function makeDirectory($path, $mode = 0755, $recursive = false, $force = false)
    {
        if ($force) {
            return @mkdir($path, $mode, $recursive);
        }
        return mkdir($path, $mode, $recursive);
    }
    public function moveDirectory($from, $to, $overwrite = false)
    {
        if ($overwrite && $this->isDirectory($to) && !$this->deleteDirectory($to)) {
            return false;
        }
        return @rename($from, $to) === true;
    }
    public function copyDirectory($directory, $destination, $options = null)
    {
        if (!$this->isDirectory($directory)) {
            return false;
        }
        $options = $options ?: FilesystemIterator::SKIP_DOTS;
        $this->ensureDirectoryExists($destination, 0777);
        $items = new FilesystemIterator($directory, $options);
        foreach ($items as $item) {
            $target = $destination . '/' . $item->getBasename();
            if ($item->isDir()) {
                $path = $item->getPathname();
                if (!$this->copyDirectory($path, $target, $options)) {
                    return false;
                }
            } else {
                if (!$this->copy($item->getPathname(), $target)) {
                    return false;
                }
            }
        }
        return true;
    }
    public function deleteDirectory($directory, $preserve = false)
    {
        if (!$this->isDirectory($directory)) {
            return false;
        }
        $items = new FilesystemIterator($directory);
        foreach ($items as $item) {
            if ($item->isDir() && !$item->isLink()) {
                $this->deleteDirectory($item->getPathname());
            } else {
                $this->delete($item->getPathname());
            }
        }
        if (!$preserve) {
            @rmdir($directory);
        }
        return true;
    }
    public function deleteDirectories($directory)
    {
        $allDirectories = $this->directories($directory);
        if (!empty($allDirectories)) {
            foreach ($allDirectories as $directoryName) {
                $this->deleteDirectory($directoryName);
            }
            return true;
        }
        return false;
    }
    public function cleanDirectory($directory)
    {
        return $this->deleteDirectory($directory, true);
    }
}
}

namespace Illuminate\Filesystem {
use Illuminate\Support\ServiceProvider;
class FilesystemServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerNativeFilesystem();
        $this->registerFlysystem();
    }
    protected function registerNativeFilesystem()
    {
        $this->app->singleton('files', function () {
            return new Filesystem();
        });
    }
    protected function registerFlysystem()
    {
        $this->registerManager();
        $this->app->singleton('filesystem.disk', function ($app) {
            return $app['filesystem']->disk($this->getDefaultDriver());
        });
        $this->app->singleton('filesystem.cloud', function ($app) {
            return $app['filesystem']->disk($this->getCloudDriver());
        });
    }
    protected function registerManager()
    {
        $this->app->singleton('filesystem', function ($app) {
            return new FilesystemManager($app);
        });
    }
    protected function getDefaultDriver()
    {
        return $this->app['config']['filesystems.default'];
    }
    protected function getCloudDriver()
    {
        return $this->app['config']['filesystems.cloud'];
    }
}
}

namespace Illuminate\Pipeline {
use Closure;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Pipeline\Pipeline as PipelineContract;
use RuntimeException;
use Throwable;
class Pipeline implements PipelineContract
{
    protected $container;
    protected $passable;
    protected $pipes = [];
    protected $method = 'handle';
    public function __construct(Container $container = null)
    {
        $this->container = $container;
    }
    public function send($passable)
    {
        $this->passable = $passable;
        return $this;
    }
    public function through($pipes)
    {
        $this->pipes = is_array($pipes) ? $pipes : func_get_args();
        return $this;
    }
    public function via($method)
    {
        $this->method = $method;
        return $this;
    }
    public function then(Closure $destination)
    {
        $pipeline = array_reduce(array_reverse($this->pipes()), $this->carry(), $this->prepareDestination($destination));
        return $pipeline($this->passable);
    }
    public function thenReturn()
    {
        return $this->then(function ($passable) {
            return $passable;
        });
    }
    protected function prepareDestination(Closure $destination)
    {
        return function ($passable) use($destination) {
            try {
                return $destination($passable);
            } catch (Throwable $e) {
                return $this->handleException($passable, $e);
            }
        };
    }
    protected function carry()
    {
        return function ($stack, $pipe) {
            return function ($passable) use($stack, $pipe) {
                try {
                    if (is_callable($pipe)) {
                        return $pipe($passable, $stack);
                    } elseif (!is_object($pipe)) {
                        [$name, $parameters] = $this->parsePipeString($pipe);
                        $pipe = $this->getContainer()->make($name);
                        $parameters = array_merge([$passable, $stack], $parameters);
                    } else {
                        $parameters = [$passable, $stack];
                    }
                    $carry = method_exists($pipe, $this->method) ? $pipe->{$this->method}(...$parameters) : $pipe(...$parameters);
                    return $this->handleCarry($carry);
                } catch (Throwable $e) {
                    return $this->handleException($passable, $e);
                }
            };
        };
    }
    protected function parsePipeString($pipe)
    {
        [$name, $parameters] = array_pad(explode(':', $pipe, 2), 2, []);
        if (is_string($parameters)) {
            $parameters = explode(',', $parameters);
        }
        return [$name, $parameters];
    }
    protected function pipes()
    {
        return $this->pipes;
    }
    protected function getContainer()
    {
        if (!$this->container) {
            throw new RuntimeException('A container instance has not been passed to the Pipeline.');
        }
        return $this->container;
    }
    public function setContainer(Container $container)
    {
        $this->container = $container;
        return $this;
    }
    protected function handleCarry($carry)
    {
        return $carry;
    }
    protected function handleException($passable, Throwable $e)
    {
        throw $e;
    }
}
}

namespace Illuminate\Database {
use Closure;
use DateTimeInterface;
use Doctrine\DBAL\Connection as DoctrineConnection;
use Doctrine\DBAL\Types\Type;
use Exception;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\Events\StatementPrepared;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Database\Events\TransactionCommitted;
use Illuminate\Database\Events\TransactionRolledBack;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Query\Grammars\Grammar as QueryGrammar;
use Illuminate\Database\Query\Processors\Processor;
use Illuminate\Database\Schema\Builder as SchemaBuilder;
use Illuminate\Support\Arr;
use LogicException;
use PDO;
use PDOStatement;
use RuntimeException;
class Connection implements ConnectionInterface
{
    use DetectsConcurrencyErrors, DetectsLostConnections, Concerns\ManagesTransactions;
    protected $pdo;
    protected $readPdo;
    protected $database;
    protected $readWriteType;
    protected $tablePrefix = '';
    protected $config = [];
    protected $reconnector;
    protected $queryGrammar;
    protected $schemaGrammar;
    protected $postProcessor;
    protected $events;
    protected $fetchMode = PDO::FETCH_OBJ;
    protected $transactions = 0;
    protected $transactionsManager;
    protected $recordsModified = false;
    protected $readOnWriteConnection = false;
    protected $queryLog = [];
    protected $loggingQueries = false;
    protected $pretending = false;
    protected $beforeExecutingCallbacks = [];
    protected $doctrineConnection;
    protected $doctrineTypeMappings = [];
    protected static $resolvers = [];
    public function __construct($pdo, $database = '', $tablePrefix = '', array $config = [])
    {
        $this->pdo = $pdo;
        $this->database = $database;
        $this->tablePrefix = $tablePrefix;
        $this->config = $config;
        $this->useDefaultQueryGrammar();
        $this->useDefaultPostProcessor();
    }
    public function useDefaultQueryGrammar()
    {
        $this->queryGrammar = $this->getDefaultQueryGrammar();
    }
    protected function getDefaultQueryGrammar()
    {
        return new QueryGrammar();
    }
    public function useDefaultSchemaGrammar()
    {
        $this->schemaGrammar = $this->getDefaultSchemaGrammar();
    }
    protected function getDefaultSchemaGrammar()
    {
    }
    public function useDefaultPostProcessor()
    {
        $this->postProcessor = $this->getDefaultPostProcessor();
    }
    protected function getDefaultPostProcessor()
    {
        return new Processor();
    }
    public function getSchemaBuilder()
    {
        if (is_null($this->schemaGrammar)) {
            $this->useDefaultSchemaGrammar();
        }
        return new SchemaBuilder($this);
    }
    public function table($table, $as = null)
    {
        return $this->query()->from($table, $as);
    }
    public function query()
    {
        return new QueryBuilder($this, $this->getQueryGrammar(), $this->getPostProcessor());
    }
    public function selectOne($query, $bindings = [], $useReadPdo = true)
    {
        $records = $this->select($query, $bindings, $useReadPdo);
        return array_shift($records);
    }
    public function selectFromWriteConnection($query, $bindings = [])
    {
        return $this->select($query, $bindings, false);
    }
    public function select($query, $bindings = [], $useReadPdo = true)
    {
        return $this->run($query, $bindings, function ($query, $bindings) use($useReadPdo) {
            if ($this->pretending()) {
                return [];
            }
            $statement = $this->prepared($this->getPdoForSelect($useReadPdo)->prepare($query));
            $this->bindValues($statement, $this->prepareBindings($bindings));
            $statement->execute();
            return $statement->fetchAll();
        });
    }
    public function cursor($query, $bindings = [], $useReadPdo = true)
    {
        $statement = $this->run($query, $bindings, function ($query, $bindings) use($useReadPdo) {
            if ($this->pretending()) {
                return [];
            }
            $statement = $this->prepared($this->getPdoForSelect($useReadPdo)->prepare($query));
            $this->bindValues($statement, $this->prepareBindings($bindings));
            $statement->execute();
            return $statement;
        });
        while ($record = $statement->fetch()) {
            (yield $record);
        }
    }
    protected function prepared(PDOStatement $statement)
    {
        $statement->setFetchMode($this->fetchMode);
        $this->event(new StatementPrepared($this, $statement));
        return $statement;
    }
    protected function getPdoForSelect($useReadPdo = true)
    {
        return $useReadPdo ? $this->getReadPdo() : $this->getPdo();
    }
    public function insert($query, $bindings = [])
    {
        return $this->statement($query, $bindings);
    }
    public function update($query, $bindings = [])
    {
        return $this->affectingStatement($query, $bindings);
    }
    public function delete($query, $bindings = [])
    {
        return $this->affectingStatement($query, $bindings);
    }
    public function statement($query, $bindings = [])
    {
        return $this->run($query, $bindings, function ($query, $bindings) {
            if ($this->pretending()) {
                return true;
            }
            $statement = $this->getPdo()->prepare($query);
            $this->bindValues($statement, $this->prepareBindings($bindings));
            $this->recordsHaveBeenModified();
            return $statement->execute();
        });
    }
    public function affectingStatement($query, $bindings = [])
    {
        return $this->run($query, $bindings, function ($query, $bindings) {
            if ($this->pretending()) {
                return 0;
            }
            $statement = $this->getPdo()->prepare($query);
            $this->bindValues($statement, $this->prepareBindings($bindings));
            $statement->execute();
            $this->recordsHaveBeenModified(($count = $statement->rowCount()) > 0);
            return $count;
        });
    }
    public function unprepared($query)
    {
        return $this->run($query, [], function ($query) {
            if ($this->pretending()) {
                return true;
            }
            $this->recordsHaveBeenModified($change = $this->getPdo()->exec($query) !== false);
            return $change;
        });
    }
    public function pretend(Closure $callback)
    {
        return $this->withFreshQueryLog(function () use($callback) {
            $this->pretending = true;
            $callback($this);
            $this->pretending = false;
            return $this->queryLog;
        });
    }
    protected function withFreshQueryLog($callback)
    {
        $loggingQueries = $this->loggingQueries;
        $this->enableQueryLog();
        $this->queryLog = [];
        $result = $callback();
        $this->loggingQueries = $loggingQueries;
        return $result;
    }
    public function bindValues($statement, $bindings)
    {
        foreach ($bindings as $key => $value) {
            $statement->bindValue(is_string($key) ? $key : $key + 1, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
    }
    public function prepareBindings(array $bindings)
    {
        $grammar = $this->getQueryGrammar();
        foreach ($bindings as $key => $value) {
            if ($value instanceof DateTimeInterface) {
                $bindings[$key] = $value->format($grammar->getDateFormat());
            } elseif (is_bool($value)) {
                $bindings[$key] = (int) $value;
            }
        }
        return $bindings;
    }
    protected function run($query, $bindings, Closure $callback)
    {
        foreach ($this->beforeExecutingCallbacks as $beforeExecutingCallback) {
            $beforeExecutingCallback($query, $bindings, $this);
        }
        $this->reconnectIfMissingConnection();
        $start = microtime(true);
        try {
            $result = $this->runQueryCallback($query, $bindings, $callback);
        } catch (QueryException $e) {
            $result = $this->handleQueryException($e, $query, $bindings, $callback);
        }
        $this->logQuery($query, $bindings, $this->getElapsedTime($start));
        return $result;
    }
    protected function runQueryCallback($query, $bindings, Closure $callback)
    {
        try {
            return $callback($query, $bindings);
        } catch (Exception $e) {
            throw new QueryException($query, $this->prepareBindings($bindings), $e);
        }
    }
    public function logQuery($query, $bindings, $time = null)
    {
        $this->event(new QueryExecuted($query, $bindings, $time, $this));
        if ($this->loggingQueries) {
            $this->queryLog[] = compact('query', 'bindings', 'time');
        }
    }
    protected function getElapsedTime($start)
    {
        return round((microtime(true) - $start) * 1000, 2);
    }
    protected function handleQueryException(QueryException $e, $query, $bindings, Closure $callback)
    {
        if ($this->transactions >= 1) {
            throw $e;
        }
        return $this->tryAgainIfCausedByLostConnection($e, $query, $bindings, $callback);
    }
    protected function tryAgainIfCausedByLostConnection(QueryException $e, $query, $bindings, Closure $callback)
    {
        if ($this->causedByLostConnection($e->getPrevious())) {
            $this->reconnect();
            return $this->runQueryCallback($query, $bindings, $callback);
        }
        throw $e;
    }
    public function reconnect()
    {
        if (is_callable($this->reconnector)) {
            $this->doctrineConnection = null;
            return call_user_func($this->reconnector, $this);
        }
        throw new LogicException('Lost connection and no reconnector available.');
    }
    protected function reconnectIfMissingConnection()
    {
        if (is_null($this->pdo)) {
            $this->reconnect();
        }
    }
    public function disconnect()
    {
        $this->setPdo(null)->setReadPdo(null);
        $this->doctrineConnection = null;
    }
    public function beforeExecuting(Closure $callback)
    {
        $this->beforeExecutingCallbacks[] = $callback;
        return $this;
    }
    public function listen(Closure $callback)
    {
        if (isset($this->events)) {
            $this->events->listen(Events\QueryExecuted::class, $callback);
        }
    }
    protected function fireConnectionEvent($event)
    {
        if (!isset($this->events)) {
            return;
        }
        switch ($event) {
            case 'beganTransaction':
                return $this->events->dispatch(new TransactionBeginning($this));
            case 'committed':
                return $this->events->dispatch(new TransactionCommitted($this));
            case 'rollingBack':
                return $this->events->dispatch(new TransactionRolledBack($this));
        }
    }
    protected function event($event)
    {
        if (isset($this->events)) {
            $this->events->dispatch($event);
        }
    }
    public function raw($value)
    {
        return new Expression($value);
    }
    public function hasModifiedRecords()
    {
        return $this->recordsModified;
    }
    public function recordsHaveBeenModified($value = true)
    {
        if (!$this->recordsModified) {
            $this->recordsModified = $value;
        }
    }
    public function setRecordModificationState(bool $value)
    {
        $this->recordsModified = $value;
        return $this;
    }
    public function forgetRecordModificationState()
    {
        $this->recordsModified = false;
    }
    public function useWriteConnectionWhenReading($value = true)
    {
        $this->readOnWriteConnection = $value;
        return $this;
    }
    public function isDoctrineAvailable()
    {
        return class_exists('Doctrine\\DBAL\\Connection');
    }
    public function getDoctrineColumn($table, $column)
    {
        $schema = $this->getDoctrineSchemaManager();
        return $schema->listTableDetails($table)->getColumn($column);
    }
    public function getDoctrineSchemaManager()
    {
        $connection = $this->getDoctrineConnection();
        return $this->getDoctrineDriver()->getSchemaManager($connection, $connection->getDatabasePlatform());
    }
    public function getDoctrineConnection()
    {
        if (is_null($this->doctrineConnection)) {
            $driver = $this->getDoctrineDriver();
            $this->doctrineConnection = new DoctrineConnection(array_filter(['pdo' => $this->getPdo(), 'dbname' => $this->getDatabaseName(), 'driver' => method_exists($driver, 'getName') ? $driver->getName() : null, 'serverVersion' => $this->getConfig('server_version')]), $driver);
            foreach ($this->doctrineTypeMappings as $name => $type) {
                $this->doctrineConnection->getDatabasePlatform()->registerDoctrineTypeMapping($type, $name);
            }
        }
        return $this->doctrineConnection;
    }
    public function registerDoctrineType(string $class, string $name, string $type) : void
    {
        if (!$this->isDoctrineAvailable()) {
            throw new RuntimeException('Registering a custom Doctrine type requires Doctrine DBAL (doctrine/dbal).');
        }
        if (!Type::hasType($name)) {
            Type::addType($name, $class);
        }
        $this->doctrineTypeMappings[$name] = $type;
    }
    public function getPdo()
    {
        if ($this->pdo instanceof Closure) {
            return $this->pdo = call_user_func($this->pdo);
        }
        return $this->pdo;
    }
    public function getRawPdo()
    {
        return $this->pdo;
    }
    public function getReadPdo()
    {
        if ($this->transactions > 0) {
            return $this->getPdo();
        }
        if ($this->readOnWriteConnection || $this->recordsModified && $this->getConfig('sticky')) {
            return $this->getPdo();
        }
        if ($this->readPdo instanceof Closure) {
            return $this->readPdo = call_user_func($this->readPdo);
        }
        return $this->readPdo ?: $this->getPdo();
    }
    public function getRawReadPdo()
    {
        return $this->readPdo;
    }
    public function setPdo($pdo)
    {
        $this->transactions = 0;
        $this->pdo = $pdo;
        return $this;
    }
    public function setReadPdo($pdo)
    {
        $this->readPdo = $pdo;
        return $this;
    }
    public function setReconnector(callable $reconnector)
    {
        $this->reconnector = $reconnector;
        return $this;
    }
    public function getName()
    {
        return $this->getConfig('name');
    }
    public function getNameWithReadWriteType()
    {
        return $this->getName() . ($this->readWriteType ? '::' . $this->readWriteType : '');
    }
    public function getConfig($option = null)
    {
        return Arr::get($this->config, $option);
    }
    public function getDriverName()
    {
        return $this->getConfig('driver');
    }
    public function getQueryGrammar()
    {
        return $this->queryGrammar;
    }
    public function setQueryGrammar(Query\Grammars\Grammar $grammar)
    {
        $this->queryGrammar = $grammar;
        return $this;
    }
    public function getSchemaGrammar()
    {
        return $this->schemaGrammar;
    }
    public function setSchemaGrammar(Schema\Grammars\Grammar $grammar)
    {
        $this->schemaGrammar = $grammar;
        return $this;
    }
    public function getPostProcessor()
    {
        return $this->postProcessor;
    }
    public function setPostProcessor(Processor $processor)
    {
        $this->postProcessor = $processor;
        return $this;
    }
    public function getEventDispatcher()
    {
        return $this->events;
    }
    public function setEventDispatcher(Dispatcher $events)
    {
        $this->events = $events;
        return $this;
    }
    public function unsetEventDispatcher()
    {
        $this->events = null;
    }
    public function setTransactionManager($manager)
    {
        $this->transactionsManager = $manager;
        return $this;
    }
    public function unsetTransactionManager()
    {
        $this->transactionsManager = null;
    }
    public function pretending()
    {
        return $this->pretending === true;
    }
    public function getQueryLog()
    {
        return $this->queryLog;
    }
    public function flushQueryLog()
    {
        $this->queryLog = [];
    }
    public function enableQueryLog()
    {
        $this->loggingQueries = true;
    }
    public function disableQueryLog()
    {
        $this->loggingQueries = false;
    }
    public function logging()
    {
        return $this->loggingQueries;
    }
    public function getDatabaseName()
    {
        return $this->database;
    }
    public function setDatabaseName($database)
    {
        $this->database = $database;
        return $this;
    }
    public function setReadWriteType($readWriteType)
    {
        $this->readWriteType = $readWriteType;
        return $this;
    }
    public function getTablePrefix()
    {
        return $this->tablePrefix;
    }
    public function setTablePrefix($prefix)
    {
        $this->tablePrefix = $prefix;
        $this->getQueryGrammar()->setTablePrefix($prefix);
        return $this;
    }
    public function withTablePrefix(Grammar $grammar)
    {
        $grammar->setTablePrefix($this->tablePrefix);
        return $grammar;
    }
    public static function resolverFor($driver, Closure $callback)
    {
        static::$resolvers[$driver] = $callback;
    }
    public static function getResolver($driver)
    {
        return static::$resolvers[$driver] ?? null;
    }
}
}

namespace Illuminate\Database {
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Traits\Macroable;
abstract class Grammar
{
    use Macroable;
    protected $tablePrefix = '';
    public function wrapArray(array $values)
    {
        return array_map([$this, 'wrap'], $values);
    }
    public function wrapTable($table)
    {
        if (!$this->isExpression($table)) {
            return $this->wrap($this->tablePrefix . $table, true);
        }
        return $this->getValue($table);
    }
    public function wrap($value, $prefixAlias = false)
    {
        if ($this->isExpression($value)) {
            return $this->getValue($value);
        }
        if (stripos($value, ' as ') !== false) {
            return $this->wrapAliasedValue($value, $prefixAlias);
        }
        return $this->wrapSegments(explode('.', $value));
    }
    protected function wrapAliasedValue($value, $prefixAlias = false)
    {
        $segments = preg_split('/\\s+as\\s+/i', $value);
        if ($prefixAlias) {
            $segments[1] = $this->tablePrefix . $segments[1];
        }
        return $this->wrap($segments[0]) . ' as ' . $this->wrapValue($segments[1]);
    }
    protected function wrapSegments($segments)
    {
        return collect($segments)->map(function ($segment, $key) use($segments) {
            return $key == 0 && count($segments) > 1 ? $this->wrapTable($segment) : $this->wrapValue($segment);
        })->implode('.');
    }
    protected function wrapValue($value)
    {
        if ($value !== '*') {
            return '"' . str_replace('"', '""', $value) . '"';
        }
        return $value;
    }
    public function columnize(array $columns)
    {
        return implode(', ', array_map([$this, 'wrap'], $columns));
    }
    public function parameterize(array $values)
    {
        return implode(', ', array_map([$this, 'parameter'], $values));
    }
    public function parameter($value)
    {
        return $this->isExpression($value) ? $this->getValue($value) : '?';
    }
    public function quoteString($value)
    {
        if (is_array($value)) {
            return implode(', ', array_map([$this, __FUNCTION__], $value));
        }
        return "'{$value}'";
    }
    public function isExpression($value)
    {
        return $value instanceof Expression;
    }
    public function getValue($expression)
    {
        return $expression->getValue();
    }
    public function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }
    public function getTablePrefix()
    {
        return $this->tablePrefix;
    }
    public function setTablePrefix($prefix)
    {
        $this->tablePrefix = $prefix;
        return $this;
    }
}
}

namespace Illuminate\Database {
use Doctrine\DBAL\Types\Type;
use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Support\Arr;
use Illuminate\Support\ConfigurationUrlParser;
use Illuminate\Support\Str;
use InvalidArgumentException;
use PDO;
use RuntimeException;
class DatabaseManager implements ConnectionResolverInterface
{
    protected $app;
    protected $factory;
    protected $connections = [];
    protected $extensions = [];
    protected $reconnector;
    protected $doctrineTypes = [];
    public function __construct($app, ConnectionFactory $factory)
    {
        $this->app = $app;
        $this->factory = $factory;
        $this->reconnector = function ($connection) {
            $this->reconnect($connection->getNameWithReadWriteType());
        };
    }
    public function connection($name = null)
    {
        [$database, $type] = $this->parseConnectionName($name);
        $name = $name ?: $database;
        if (!isset($this->connections[$name])) {
            $this->connections[$name] = $this->configure($this->makeConnection($database), $type);
        }
        return $this->connections[$name];
    }
    protected function parseConnectionName($name)
    {
        $name = $name ?: $this->getDefaultConnection();
        return Str::endsWith($name, ['::read', '::write']) ? explode('::', $name, 2) : [$name, null];
    }
    protected function makeConnection($name)
    {
        $config = $this->configuration($name);
        if (isset($this->extensions[$name])) {
            return call_user_func($this->extensions[$name], $config, $name);
        }
        if (isset($this->extensions[$driver = $config['driver']])) {
            return call_user_func($this->extensions[$driver], $config, $name);
        }
        return $this->factory->make($config, $name);
    }
    protected function configuration($name)
    {
        $name = $name ?: $this->getDefaultConnection();
        $connections = $this->app['config']['database.connections'];
        if (is_null($config = Arr::get($connections, $name))) {
            throw new InvalidArgumentException("Database connection [{$name}] not configured.");
        }
        return (new ConfigurationUrlParser())->parseConfiguration($config);
    }
    protected function configure(Connection $connection, $type)
    {
        $connection = $this->setPdoForType($connection, $type)->setReadWriteType($type);
        if ($this->app->bound('events')) {
            $connection->setEventDispatcher($this->app['events']);
        }
        if ($this->app->bound('db.transactions')) {
            $connection->setTransactionManager($this->app['db.transactions']);
        }
        $connection->setReconnector($this->reconnector);
        $this->registerConfiguredDoctrineTypes($connection);
        return $connection;
    }
    protected function setPdoForType(Connection $connection, $type = null)
    {
        if ($type === 'read') {
            $connection->setPdo($connection->getReadPdo());
        } elseif ($type === 'write') {
            $connection->setReadPdo($connection->getPdo());
        }
        return $connection;
    }
    protected function registerConfiguredDoctrineTypes(Connection $connection) : void
    {
        foreach ($this->app['config']->get('database.dbal.types', []) as $name => $class) {
            $this->registerDoctrineType($class, $name, $name);
        }
        foreach ($this->doctrineTypes as $name => [$type, $class]) {
            $connection->registerDoctrineType($class, $name, $type);
        }
    }
    public function registerDoctrineType(string $class, string $name, string $type) : void
    {
        if (!class_exists('Doctrine\\DBAL\\Connection')) {
            throw new RuntimeException('Registering a custom Doctrine type requires Doctrine DBAL (doctrine/dbal).');
        }
        if (!Type::hasType($name)) {
            Type::addType($name, $class);
        }
        $this->doctrineTypes[$name] = [$type, $class];
    }
    public function purge($name = null)
    {
        $name = $name ?: $this->getDefaultConnection();
        $this->disconnect($name);
        unset($this->connections[$name]);
    }
    public function disconnect($name = null)
    {
        if (isset($this->connections[$name = $name ?: $this->getDefaultConnection()])) {
            $this->connections[$name]->disconnect();
        }
    }
    public function reconnect($name = null)
    {
        $this->disconnect($name = $name ?: $this->getDefaultConnection());
        if (!isset($this->connections[$name])) {
            return $this->connection($name);
        }
        return $this->refreshPdoConnections($name);
    }
    public function usingConnection($name, callable $callback)
    {
        $previousName = $this->getDefaultConnection();
        $this->setDefaultConnection($name);
        return tap($callback(), function () use($previousName) {
            $this->setDefaultConnection($previousName);
        });
    }
    protected function refreshPdoConnections($name)
    {
        [$database, $type] = $this->parseConnectionName($name);
        $fresh = $this->configure($this->makeConnection($database), $type);
        return $this->connections[$name]->setPdo($fresh->getRawPdo())->setReadPdo($fresh->getRawReadPdo());
    }
    public function getDefaultConnection()
    {
        return $this->app['config']['database.default'];
    }
    public function setDefaultConnection($name)
    {
        $this->app['config']['database.default'] = $name;
    }
    public function supportedDrivers()
    {
        return ['mysql', 'pgsql', 'sqlite', 'sqlsrv'];
    }
    public function availableDrivers()
    {
        return array_intersect($this->supportedDrivers(), str_replace('dblib', 'sqlsrv', PDO::getAvailableDrivers()));
    }
    public function extend($name, callable $resolver)
    {
        $this->extensions[$name] = $resolver;
    }
    public function getConnections()
    {
        return $this->connections;
    }
    public function setReconnector(callable $reconnector)
    {
        $this->reconnector = $reconnector;
    }
    public function setApplication($app)
    {
        $this->app = $app;
        return $this;
    }
    public function __call($method, $parameters)
    {
        return $this->connection()->{$method}(...$parameters);
    }
}
}

namespace Illuminate\Database {
use Doctrine\DBAL\Driver\PDOPgSql\Driver as DoctrineDriver;
use Doctrine\DBAL\Version;
use Illuminate\Database\PDO\PostgresDriver;
use Illuminate\Database\Query\Grammars\PostgresGrammar as QueryGrammar;
use Illuminate\Database\Query\Processors\PostgresProcessor;
use Illuminate\Database\Schema\Grammars\PostgresGrammar as SchemaGrammar;
use Illuminate\Database\Schema\PostgresBuilder;
use Illuminate\Database\Schema\PostgresSchemaState;
use Illuminate\Filesystem\Filesystem;
use PDO;
class PostgresConnection extends Connection
{
    public function bindValues($statement, $bindings)
    {
        foreach ($bindings as $key => $value) {
            if (is_int($value)) {
                $pdoParam = PDO::PARAM_INT;
            } elseif (is_resource($value)) {
                $pdoParam = PDO::PARAM_LOB;
            } else {
                $pdoParam = PDO::PARAM_STR;
            }
            $statement->bindValue(is_string($key) ? $key : $key + 1, $value, $pdoParam);
        }
    }
    protected function getDefaultQueryGrammar()
    {
        return $this->withTablePrefix(new QueryGrammar());
    }
    public function getSchemaBuilder()
    {
        if (is_null($this->schemaGrammar)) {
            $this->useDefaultSchemaGrammar();
        }
        return new PostgresBuilder($this);
    }
    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new SchemaGrammar());
    }
    public function getSchemaState(Filesystem $files = null, callable $processFactory = null)
    {
        return new PostgresSchemaState($this, $files, $processFactory);
    }
    protected function getDefaultPostProcessor()
    {
        return new PostgresProcessor();
    }
    protected function getDoctrineDriver()
    {
        return class_exists(Version::class) ? new DoctrineDriver() : new PostgresDriver();
    }
}
}

namespace Illuminate\Database\Query\Grammars {
use Illuminate\Database\Grammar as BaseGrammar;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use RuntimeException;
class Grammar extends BaseGrammar
{
    protected $operators = [];
    protected $bitwiseOperators = [];
    protected $selectComponents = ['aggregate', 'columns', 'from', 'joins', 'wheres', 'groups', 'havings', 'orders', 'limit', 'offset', 'lock'];
    public function compileSelect(Builder $query)
    {
        if (($query->unions || $query->havings) && $query->aggregate) {
            return $this->compileUnionAggregate($query);
        }
        $original = $query->columns;
        if (is_null($query->columns)) {
            $query->columns = ['*'];
        }
        $sql = trim($this->concatenate($this->compileComponents($query)));
        if ($query->unions) {
            $sql = $this->wrapUnion($sql) . ' ' . $this->compileUnions($query);
        }
        $query->columns = $original;
        return $sql;
    }
    protected function compileComponents(Builder $query)
    {
        $sql = [];
        foreach ($this->selectComponents as $component) {
            if (isset($query->{$component})) {
                $method = 'compile' . ucfirst($component);
                $sql[$component] = $this->{$method}($query, $query->{$component});
            }
        }
        return $sql;
    }
    protected function compileAggregate(Builder $query, $aggregate)
    {
        $column = $this->columnize($aggregate['columns']);
        if (is_array($query->distinct)) {
            $column = 'distinct ' . $this->columnize($query->distinct);
        } elseif ($query->distinct && $column !== '*') {
            $column = 'distinct ' . $column;
        }
        return 'select ' . $aggregate['function'] . '(' . $column . ') as aggregate';
    }
    protected function compileColumns(Builder $query, $columns)
    {
        if (!is_null($query->aggregate)) {
            return;
        }
        if ($query->distinct) {
            $select = 'select distinct ';
        } else {
            $select = 'select ';
        }
        return $select . $this->columnize($columns);
    }
    protected function compileFrom(Builder $query, $table)
    {
        return 'from ' . $this->wrapTable($table);
    }
    protected function compileJoins(Builder $query, $joins)
    {
        return collect($joins)->map(function ($join) use($query) {
            $table = $this->wrapTable($join->table);
            $nestedJoins = is_null($join->joins) ? '' : ' ' . $this->compileJoins($query, $join->joins);
            $tableAndNestedJoins = is_null($join->joins) ? $table : '(' . $table . $nestedJoins . ')';
            return trim("{$join->type} join {$tableAndNestedJoins} {$this->compileWheres($join)}");
        })->implode(' ');
    }
    public function compileWheres(Builder $query)
    {
        if (is_null($query->wheres)) {
            return '';
        }
        if (count($sql = $this->compileWheresToArray($query)) > 0) {
            return $this->concatenateWhereClauses($query, $sql);
        }
        return '';
    }
    protected function compileWheresToArray($query)
    {
        return collect($query->wheres)->map(function ($where) use($query) {
            return $where['boolean'] . ' ' . $this->{"where{$where['type']}"}($query, $where);
        })->all();
    }
    protected function concatenateWhereClauses($query, $sql)
    {
        $conjunction = $query instanceof JoinClause ? 'on' : 'where';
        return $conjunction . ' ' . $this->removeLeadingBoolean(implode(' ', $sql));
    }
    protected function whereRaw(Builder $query, $where)
    {
        return $where['sql'];
    }
    protected function whereBasic(Builder $query, $where)
    {
        $value = $this->parameter($where['value']);
        $operator = str_replace('?', '??', $where['operator']);
        return $this->wrap($where['column']) . ' ' . $operator . ' ' . $value;
    }
    protected function whereBitwise(Builder $query, $where)
    {
        return $this->whereBasic($query, $where);
    }
    protected function whereIn(Builder $query, $where)
    {
        if (!empty($where['values'])) {
            return $this->wrap($where['column']) . ' in (' . $this->parameterize($where['values']) . ')';
        }
        return '0 = 1';
    }
    protected function whereNotIn(Builder $query, $where)
    {
        if (!empty($where['values'])) {
            return $this->wrap($where['column']) . ' not in (' . $this->parameterize($where['values']) . ')';
        }
        return '1 = 1';
    }
    protected function whereNotInRaw(Builder $query, $where)
    {
        if (!empty($where['values'])) {
            return $this->wrap($where['column']) . ' not in (' . implode(', ', $where['values']) . ')';
        }
        return '1 = 1';
    }
    protected function whereInRaw(Builder $query, $where)
    {
        if (!empty($where['values'])) {
            return $this->wrap($where['column']) . ' in (' . implode(', ', $where['values']) . ')';
        }
        return '0 = 1';
    }
    protected function whereNull(Builder $query, $where)
    {
        return $this->wrap($where['column']) . ' is null';
    }
    protected function whereNotNull(Builder $query, $where)
    {
        return $this->wrap($where['column']) . ' is not null';
    }
    protected function whereBetween(Builder $query, $where)
    {
        $between = $where['not'] ? 'not between' : 'between';
        $min = $this->parameter(reset($where['values']));
        $max = $this->parameter(end($where['values']));
        return $this->wrap($where['column']) . ' ' . $between . ' ' . $min . ' and ' . $max;
    }
    protected function whereBetweenColumns(Builder $query, $where)
    {
        $between = $where['not'] ? 'not between' : 'between';
        $min = $this->wrap(reset($where['values']));
        $max = $this->wrap(end($where['values']));
        return $this->wrap($where['column']) . ' ' . $between . ' ' . $min . ' and ' . $max;
    }
    protected function whereDate(Builder $query, $where)
    {
        return $this->dateBasedWhere('date', $query, $where);
    }
    protected function whereTime(Builder $query, $where)
    {
        return $this->dateBasedWhere('time', $query, $where);
    }
    protected function whereDay(Builder $query, $where)
    {
        return $this->dateBasedWhere('day', $query, $where);
    }
    protected function whereMonth(Builder $query, $where)
    {
        return $this->dateBasedWhere('month', $query, $where);
    }
    protected function whereYear(Builder $query, $where)
    {
        return $this->dateBasedWhere('year', $query, $where);
    }
    protected function dateBasedWhere($type, Builder $query, $where)
    {
        $value = $this->parameter($where['value']);
        return $type . '(' . $this->wrap($where['column']) . ') ' . $where['operator'] . ' ' . $value;
    }
    protected function whereColumn(Builder $query, $where)
    {
        return $this->wrap($where['first']) . ' ' . $where['operator'] . ' ' . $this->wrap($where['second']);
    }
    protected function whereNested(Builder $query, $where)
    {
        $offset = $query instanceof JoinClause ? 3 : 6;
        return '(' . substr($this->compileWheres($where['query']), $offset) . ')';
    }
    protected function whereSub(Builder $query, $where)
    {
        $select = $this->compileSelect($where['query']);
        return $this->wrap($where['column']) . ' ' . $where['operator'] . " ({$select})";
    }
    protected function whereExists(Builder $query, $where)
    {
        return 'exists (' . $this->compileSelect($where['query']) . ')';
    }
    protected function whereNotExists(Builder $query, $where)
    {
        return 'not exists (' . $this->compileSelect($where['query']) . ')';
    }
    protected function whereRowValues(Builder $query, $where)
    {
        $columns = $this->columnize($where['columns']);
        $values = $this->parameterize($where['values']);
        return '(' . $columns . ') ' . $where['operator'] . ' (' . $values . ')';
    }
    protected function whereJsonBoolean(Builder $query, $where)
    {
        $column = $this->wrapJsonBooleanSelector($where['column']);
        $value = $this->wrapJsonBooleanValue($this->parameter($where['value']));
        return $column . ' ' . $where['operator'] . ' ' . $value;
    }
    protected function whereJsonContains(Builder $query, $where)
    {
        $not = $where['not'] ? 'not ' : '';
        return $not . $this->compileJsonContains($where['column'], $this->parameter($where['value']));
    }
    protected function compileJsonContains($column, $value)
    {
        throw new RuntimeException('This database engine does not support JSON contains operations.');
    }
    public function prepareBindingForJsonContains($binding)
    {
        return json_encode($binding);
    }
    protected function whereJsonLength(Builder $query, $where)
    {
        return $this->compileJsonLength($where['column'], $where['operator'], $this->parameter($where['value']));
    }
    protected function compileJsonLength($column, $operator, $value)
    {
        throw new RuntimeException('This database engine does not support JSON length operations.');
    }
    public function whereFullText(Builder $query, $where)
    {
        throw new RuntimeException('This database engine does not support fulltext search operations.');
    }
    protected function compileGroups(Builder $query, $groups)
    {
        return 'group by ' . $this->columnize($groups);
    }
    protected function compileHavings(Builder $query, $havings)
    {
        $sql = implode(' ', array_map([$this, 'compileHaving'], $havings));
        return 'having ' . $this->removeLeadingBoolean($sql);
    }
    protected function compileHaving(array $having)
    {
        if ($having['type'] === 'Raw') {
            return $having['boolean'] . ' ' . $having['sql'];
        } elseif ($having['type'] === 'between') {
            return $this->compileHavingBetween($having);
        }
        return $this->compileBasicHaving($having);
    }
    protected function compileBasicHaving($having)
    {
        $column = $this->wrap($having['column']);
        $parameter = $this->parameter($having['value']);
        return $having['boolean'] . ' ' . $column . ' ' . $having['operator'] . ' ' . $parameter;
    }
    protected function compileHavingBetween($having)
    {
        $between = $having['not'] ? 'not between' : 'between';
        $column = $this->wrap($having['column']);
        $min = $this->parameter(head($having['values']));
        $max = $this->parameter(last($having['values']));
        return $having['boolean'] . ' ' . $column . ' ' . $between . ' ' . $min . ' and ' . $max;
    }
    protected function compileOrders(Builder $query, $orders)
    {
        if (!empty($orders)) {
            return 'order by ' . implode(', ', $this->compileOrdersToArray($query, $orders));
        }
        return '';
    }
    protected function compileOrdersToArray(Builder $query, $orders)
    {
        return array_map(function ($order) {
            return $order['sql'] ?? $this->wrap($order['column']) . ' ' . $order['direction'];
        }, $orders);
    }
    public function compileRandom($seed)
    {
        return 'RANDOM()';
    }
    protected function compileLimit(Builder $query, $limit)
    {
        return 'limit ' . (int) $limit;
    }
    protected function compileOffset(Builder $query, $offset)
    {
        return 'offset ' . (int) $offset;
    }
    protected function compileUnions(Builder $query)
    {
        $sql = '';
        foreach ($query->unions as $union) {
            $sql .= $this->compileUnion($union);
        }
        if (!empty($query->unionOrders)) {
            $sql .= ' ' . $this->compileOrders($query, $query->unionOrders);
        }
        if (isset($query->unionLimit)) {
            $sql .= ' ' . $this->compileLimit($query, $query->unionLimit);
        }
        if (isset($query->unionOffset)) {
            $sql .= ' ' . $this->compileOffset($query, $query->unionOffset);
        }
        return ltrim($sql);
    }
    protected function compileUnion(array $union)
    {
        $conjunction = $union['all'] ? ' union all ' : ' union ';
        return $conjunction . $this->wrapUnion($union['query']->toSql());
    }
    protected function wrapUnion($sql)
    {
        return '(' . $sql . ')';
    }
    protected function compileUnionAggregate(Builder $query)
    {
        $sql = $this->compileAggregate($query, $query->aggregate);
        $query->aggregate = null;
        return $sql . ' from (' . $this->compileSelect($query) . ') as ' . $this->wrapTable('temp_table');
    }
    public function compileExists(Builder $query)
    {
        $select = $this->compileSelect($query);
        return "select exists({$select}) as {$this->wrap('exists')}";
    }
    public function compileInsert(Builder $query, array $values)
    {
        $table = $this->wrapTable($query->from);
        if (empty($values)) {
            return "insert into {$table} default values";
        }
        if (!is_array(reset($values))) {
            $values = [$values];
        }
        $columns = $this->columnize(array_keys(reset($values)));
        $parameters = collect($values)->map(function ($record) {
            return '(' . $this->parameterize($record) . ')';
        })->implode(', ');
        return "insert into {$table} ({$columns}) values {$parameters}";
    }
    public function compileInsertOrIgnore(Builder $query, array $values)
    {
        throw new RuntimeException('This database engine does not support inserting while ignoring errors.');
    }
    public function compileInsertGetId(Builder $query, $values, $sequence)
    {
        return $this->compileInsert($query, $values);
    }
    public function compileInsertUsing(Builder $query, array $columns, string $sql)
    {
        return "insert into {$this->wrapTable($query->from)} ({$this->columnize($columns)}) {$sql}";
    }
    public function compileUpdate(Builder $query, array $values)
    {
        $table = $this->wrapTable($query->from);
        $columns = $this->compileUpdateColumns($query, $values);
        $where = $this->compileWheres($query);
        return trim(isset($query->joins) ? $this->compileUpdateWithJoins($query, $table, $columns, $where) : $this->compileUpdateWithoutJoins($query, $table, $columns, $where));
    }
    protected function compileUpdateColumns(Builder $query, array $values)
    {
        return collect($values)->map(function ($value, $key) {
            return $this->wrap($key) . ' = ' . $this->parameter($value);
        })->implode(', ');
    }
    protected function compileUpdateWithoutJoins(Builder $query, $table, $columns, $where)
    {
        return "update {$table} set {$columns} {$where}";
    }
    protected function compileUpdateWithJoins(Builder $query, $table, $columns, $where)
    {
        $joins = $this->compileJoins($query, $query->joins);
        return "update {$table} {$joins} set {$columns} {$where}";
    }
    public function compileUpsert(Builder $query, array $values, array $uniqueBy, array $update)
    {
        throw new RuntimeException('This database engine does not support upserts.');
    }
    public function prepareBindingsForUpdate(array $bindings, array $values)
    {
        $cleanBindings = Arr::except($bindings, ['select', 'join']);
        return array_values(array_merge($bindings['join'], $values, Arr::flatten($cleanBindings)));
    }
    public function compileDelete(Builder $query)
    {
        $table = $this->wrapTable($query->from);
        $where = $this->compileWheres($query);
        return trim(isset($query->joins) ? $this->compileDeleteWithJoins($query, $table, $where) : $this->compileDeleteWithoutJoins($query, $table, $where));
    }
    protected function compileDeleteWithoutJoins(Builder $query, $table, $where)
    {
        return "delete from {$table} {$where}";
    }
    protected function compileDeleteWithJoins(Builder $query, $table, $where)
    {
        $alias = last(explode(' as ', $table));
        $joins = $this->compileJoins($query, $query->joins);
        return "delete {$alias} from {$table} {$joins} {$where}";
    }
    public function prepareBindingsForDelete(array $bindings)
    {
        return Arr::flatten(Arr::except($bindings, 'select'));
    }
    public function compileTruncate(Builder $query)
    {
        return ['truncate table ' . $this->wrapTable($query->from) => []];
    }
    protected function compileLock(Builder $query, $value)
    {
        return is_string($value) ? $value : '';
    }
    public function supportsSavepoints()
    {
        return true;
    }
    public function compileSavepoint($name)
    {
        return 'SAVEPOINT ' . $name;
    }
    public function compileSavepointRollBack($name)
    {
        return 'ROLLBACK TO SAVEPOINT ' . $name;
    }
    public function wrap($value, $prefixAlias = false)
    {
        if ($this->isExpression($value)) {
            return $this->getValue($value);
        }
        if (stripos($value, ' as ') !== false) {
            return $this->wrapAliasedValue($value, $prefixAlias);
        }
        if ($this->isJsonSelector($value)) {
            return $this->wrapJsonSelector($value);
        }
        return $this->wrapSegments(explode('.', $value));
    }
    protected function wrapJsonSelector($value)
    {
        throw new RuntimeException('This database engine does not support JSON operations.');
    }
    protected function wrapJsonBooleanSelector($value)
    {
        return $this->wrapJsonSelector($value);
    }
    protected function wrapJsonBooleanValue($value)
    {
        return $value;
    }
    protected function wrapJsonFieldAndPath($column)
    {
        $parts = explode('->', $column, 2);
        $field = $this->wrap($parts[0]);
        $path = count($parts) > 1 ? ', ' . $this->wrapJsonPath($parts[1], '->') : '';
        return [$field, $path];
    }
    protected function wrapJsonPath($value, $delimiter = '->')
    {
        $value = preg_replace("/([\\\\]+)?\\'/", "''", $value);
        return '\'$."' . str_replace($delimiter, '"."', $value) . '"\'';
    }
    protected function isJsonSelector($value)
    {
        return Str::contains($value, '->');
    }
    protected function concatenate($segments)
    {
        return implode(' ', array_filter($segments, function ($value) {
            return (string) $value !== '';
        }));
    }
    protected function removeLeadingBoolean($value)
    {
        return preg_replace('/and |or /i', '', $value, 1);
    }
    public function getOperators()
    {
        return $this->operators;
    }
    public function getBitwiseOperators()
    {
        return $this->bitwiseOperators;
    }
}
}

namespace Illuminate\Database\Query\Grammars {
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
class SqlServerGrammar extends Grammar
{
    protected $operators = ['=', '<', '>', '<=', '>=', '!<', '!>', '<>', '!=', 'like', 'not like', 'ilike', '&', '&=', '|', '|=', '^', '^='];
    public function compileSelect(Builder $query)
    {
        if (!$query->offset) {
            return parent::compileSelect($query);
        }
        if (is_null($query->columns)) {
            $query->columns = ['*'];
        }
        $components = $this->compileComponents($query);
        if (!empty($components['orders'])) {
            return parent::compileSelect($query) . " offset {$query->offset} rows fetch next {$query->limit} rows only";
        }
        return $this->compileAnsiOffset($query, $components);
    }
    protected function compileColumns(Builder $query, $columns)
    {
        if (!is_null($query->aggregate)) {
            return;
        }
        $select = $query->distinct ? 'select distinct ' : 'select ';
        if (is_numeric($query->limit) && $query->limit > 0 && $query->offset <= 0) {
            $select .= 'top ' . (int) $query->limit . ' ';
        }
        return $select . $this->columnize($columns);
    }
    protected function compileFrom(Builder $query, $table)
    {
        $from = parent::compileFrom($query, $table);
        if (is_string($query->lock)) {
            return $from . ' ' . $query->lock;
        }
        if (!is_null($query->lock)) {
            return $from . ' with(rowlock,' . ($query->lock ? 'updlock,' : '') . 'holdlock)';
        }
        return $from;
    }
    protected function whereBitwise(Builder $query, $where)
    {
        $value = $this->parameter($where['value']);
        $operator = str_replace('?', '??', $where['operator']);
        return '(' . $this->wrap($where['column']) . ' ' . $operator . ' ' . $value . ') != 0';
    }
    protected function whereDate(Builder $query, $where)
    {
        $value = $this->parameter($where['value']);
        return 'cast(' . $this->wrap($where['column']) . ' as date) ' . $where['operator'] . ' ' . $value;
    }
    protected function whereTime(Builder $query, $where)
    {
        $value = $this->parameter($where['value']);
        return 'cast(' . $this->wrap($where['column']) . ' as time) ' . $where['operator'] . ' ' . $value;
    }
    protected function compileJsonContains($column, $value)
    {
        [$field, $path] = $this->wrapJsonFieldAndPath($column);
        return $value . ' in (select [value] from openjson(' . $field . $path . '))';
    }
    public function prepareBindingForJsonContains($binding)
    {
        return is_bool($binding) ? json_encode($binding) : $binding;
    }
    protected function compileJsonLength($column, $operator, $value)
    {
        [$field, $path] = $this->wrapJsonFieldAndPath($column);
        return '(select count(*) from openjson(' . $field . $path . ')) ' . $operator . ' ' . $value;
    }
    protected function compileHaving(array $having)
    {
        if ($having['type'] === 'Bitwise') {
            return $this->compileHavingBitwise($having);
        }
        return parent::compileHaving($having);
    }
    protected function compileHavingBitwise($having)
    {
        $column = $this->wrap($having['column']);
        $parameter = $this->parameter($having['value']);
        return $having['boolean'] . ' (' . $column . ' ' . $having['operator'] . ' ' . $parameter . ') != 0';
    }
    protected function compileAnsiOffset(Builder $query, $components)
    {
        if (empty($components['orders'])) {
            $components['orders'] = 'order by (select 0)';
        }
        $components['columns'] .= $this->compileOver($components['orders']);
        unset($components['orders']);
        if ($this->queryOrderContainsSubquery($query)) {
            $query->bindings = $this->sortBindingsForSubqueryOrderBy($query);
        }
        $sql = $this->concatenate($components);
        return $this->compileTableExpression($sql, $query);
    }
    protected function compileOver($orderings)
    {
        return ", row_number() over ({$orderings}) as row_num";
    }
    protected function queryOrderContainsSubquery($query)
    {
        if (!is_array($query->orders)) {
            return false;
        }
        return Arr::first($query->orders, function ($value) {
            return $this->isExpression($value['column'] ?? null);
        }, false) !== false;
    }
    protected function sortBindingsForSubqueryOrderBy($query)
    {
        return Arr::sort($query->bindings, function ($bindings, $key) {
            return array_search($key, ['select', 'order', 'from', 'join', 'where', 'groupBy', 'having', 'union', 'unionOrder']);
        });
    }
    protected function compileTableExpression($sql, $query)
    {
        $constraint = $this->compileRowConstraint($query);
        return "select * from ({$sql}) as temp_table where row_num {$constraint} order by row_num";
    }
    protected function compileRowConstraint($query)
    {
        $start = (int) $query->offset + 1;
        if ($query->limit > 0) {
            $finish = (int) $query->offset + (int) $query->limit;
            return "between {$start} and {$finish}";
        }
        return ">= {$start}";
    }
    protected function compileDeleteWithoutJoins(Builder $query, $table, $where)
    {
        $sql = parent::compileDeleteWithoutJoins($query, $table, $where);
        return !is_null($query->limit) && $query->limit > 0 && $query->offset <= 0 ? Str::replaceFirst('delete', 'delete top (' . $query->limit . ')', $sql) : $sql;
    }
    public function compileRandom($seed)
    {
        return 'NEWID()';
    }
    protected function compileLimit(Builder $query, $limit)
    {
        return '';
    }
    protected function compileOffset(Builder $query, $offset)
    {
        return '';
    }
    protected function compileLock(Builder $query, $value)
    {
        return '';
    }
    protected function wrapUnion($sql)
    {
        return 'select * from (' . $sql . ') as ' . $this->wrapTable('temp_table');
    }
    public function compileExists(Builder $query)
    {
        $existsQuery = clone $query;
        $existsQuery->columns = [];
        return $this->compileSelect($existsQuery->selectRaw('1 [exists]')->limit(1));
    }
    protected function compileUpdateWithJoins(Builder $query, $table, $columns, $where)
    {
        $alias = last(explode(' as ', $table));
        $joins = $this->compileJoins($query, $query->joins);
        return "update {$alias} set {$columns} from {$table} {$joins} {$where}";
    }
    public function compileUpsert(Builder $query, array $values, array $uniqueBy, array $update)
    {
        $columns = $this->columnize(array_keys(reset($values)));
        $sql = 'merge ' . $this->wrapTable($query->from) . ' ';
        $parameters = collect($values)->map(function ($record) {
            return '(' . $this->parameterize($record) . ')';
        })->implode(', ');
        $sql .= 'using (values ' . $parameters . ') ' . $this->wrapTable('laravel_source') . ' (' . $columns . ') ';
        $on = collect($uniqueBy)->map(function ($column) use($query) {
            return $this->wrap('laravel_source.' . $column) . ' = ' . $this->wrap($query->from . '.' . $column);
        })->implode(' and ');
        $sql .= 'on ' . $on . ' ';
        if ($update) {
            $update = collect($update)->map(function ($value, $key) {
                return is_numeric($key) ? $this->wrap($value) . ' = ' . $this->wrap('laravel_source.' . $value) : $this->wrap($key) . ' = ' . $this->parameter($value);
            })->implode(', ');
            $sql .= 'when matched then update set ' . $update . ' ';
        }
        $sql .= 'when not matched then insert (' . $columns . ') values (' . $columns . ');';
        return $sql;
    }
    public function prepareBindingsForUpdate(array $bindings, array $values)
    {
        $cleanBindings = Arr::except($bindings, 'select');
        return array_values(array_merge($values, Arr::flatten($cleanBindings)));
    }
    public function compileSavepoint($name)
    {
        return 'SAVE TRANSACTION ' . $name;
    }
    public function compileSavepointRollBack($name)
    {
        return 'ROLLBACK TRANSACTION ' . $name;
    }
    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.v';
    }
    protected function wrapValue($value)
    {
        return $value === '*' ? $value : '[' . str_replace(']', ']]', $value) . ']';
    }
    protected function wrapJsonSelector($value)
    {
        [$field, $path] = $this->wrapJsonFieldAndPath($value);
        return 'json_value(' . $field . $path . ')';
    }
    protected function wrapJsonBooleanValue($value)
    {
        return "'" . $value . "'";
    }
    public function wrapTable($table)
    {
        if (!$this->isExpression($table)) {
            return $this->wrapTableValuedFunction(parent::wrapTable($table));
        }
        return $this->getValue($table);
    }
    protected function wrapTableValuedFunction($table)
    {
        if (preg_match('/^(.+?)(\\(.*?\\))]$/', $table, $matches) === 1) {
            $table = $matches[1] . ']' . $matches[2];
        }
        return $table;
    }
}
}

namespace Illuminate\Database\Query\Grammars {
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;
class MySqlGrammar extends Grammar
{
    protected $operators = ['sounds like'];
    protected function whereNull(Builder $query, $where)
    {
        if ($this->isJsonSelector($where['column'])) {
            [$field, $path] = $this->wrapJsonFieldAndPath($where['column']);
            return '(json_extract(' . $field . $path . ') is null OR json_type(json_extract(' . $field . $path . ')) = \'NULL\')';
        }
        return parent::whereNull($query, $where);
    }
    protected function whereNotNull(Builder $query, $where)
    {
        if ($this->isJsonSelector($where['column'])) {
            [$field, $path] = $this->wrapJsonFieldAndPath($where['column']);
            return '(json_extract(' . $field . $path . ') is not null AND json_type(json_extract(' . $field . $path . ')) != \'NULL\')';
        }
        return parent::whereNotNull($query, $where);
    }
    public function whereFullText(Builder $query, $where)
    {
        $columns = $this->columnize($where['columns']);
        $value = $this->parameter($where['value']);
        $mode = ($where['options']['mode'] ?? []) === 'boolean' ? ' in boolean mode' : ' in natural language mode';
        $expanded = ($where['options']['expanded'] ?? []) && ($where['options']['mode'] ?? []) !== 'boolean' ? ' with query expansion' : '';
        return "match ({$columns}) against (" . $value . "{$mode}{$expanded})";
    }
    public function compileInsertOrIgnore(Builder $query, array $values)
    {
        return Str::replaceFirst('insert', 'insert ignore', $this->compileInsert($query, $values));
    }
    protected function compileJsonContains($column, $value)
    {
        [$field, $path] = $this->wrapJsonFieldAndPath($column);
        return 'json_contains(' . $field . ', ' . $value . $path . ')';
    }
    protected function compileJsonLength($column, $operator, $value)
    {
        [$field, $path] = $this->wrapJsonFieldAndPath($column);
        return 'json_length(' . $field . $path . ') ' . $operator . ' ' . $value;
    }
    public function compileRandom($seed)
    {
        return 'RAND(' . $seed . ')';
    }
    protected function compileLock(Builder $query, $value)
    {
        if (!is_string($value)) {
            return $value ? 'for update' : 'lock in share mode';
        }
        return $value;
    }
    public function compileInsert(Builder $query, array $values)
    {
        if (empty($values)) {
            $values = [[]];
        }
        return parent::compileInsert($query, $values);
    }
    protected function compileUpdateColumns(Builder $query, array $values)
    {
        return collect($values)->map(function ($value, $key) {
            if ($this->isJsonSelector($key)) {
                return $this->compileJsonUpdateColumn($key, $value);
            }
            return $this->wrap($key) . ' = ' . $this->parameter($value);
        })->implode(', ');
    }
    public function compileUpsert(Builder $query, array $values, array $uniqueBy, array $update)
    {
        $sql = $this->compileInsert($query, $values) . ' on duplicate key update ';
        $columns = collect($update)->map(function ($value, $key) {
            return is_numeric($key) ? $this->wrap($value) . ' = values(' . $this->wrap($value) . ')' : $this->wrap($key) . ' = ' . $this->parameter($value);
        })->implode(', ');
        return $sql . $columns;
    }
    protected function compileJsonUpdateColumn($key, $value)
    {
        if (is_bool($value)) {
            $value = $value ? 'true' : 'false';
        } elseif (is_array($value)) {
            $value = 'cast(? as json)';
        } else {
            $value = $this->parameter($value);
        }
        [$field, $path] = $this->wrapJsonFieldAndPath($key);
        return "{$field} = json_set({$field}{$path}, {$value})";
    }
    protected function compileUpdateWithoutJoins(Builder $query, $table, $columns, $where)
    {
        $sql = parent::compileUpdateWithoutJoins($query, $table, $columns, $where);
        if (!empty($query->orders)) {
            $sql .= ' ' . $this->compileOrders($query, $query->orders);
        }
        if (isset($query->limit)) {
            $sql .= ' ' . $this->compileLimit($query, $query->limit);
        }
        return $sql;
    }
    public function prepareBindingsForUpdate(array $bindings, array $values)
    {
        $values = collect($values)->reject(function ($value, $column) {
            return $this->isJsonSelector($column) && is_bool($value);
        })->map(function ($value) {
            return is_array($value) ? json_encode($value) : $value;
        })->all();
        return parent::prepareBindingsForUpdate($bindings, $values);
    }
    protected function compileDeleteWithoutJoins(Builder $query, $table, $where)
    {
        $sql = parent::compileDeleteWithoutJoins($query, $table, $where);
        if (!empty($query->orders)) {
            $sql .= ' ' . $this->compileOrders($query, $query->orders);
        }
        if (isset($query->limit)) {
            $sql .= ' ' . $this->compileLimit($query, $query->limit);
        }
        return $sql;
    }
    protected function wrapValue($value)
    {
        return $value === '*' ? $value : '`' . str_replace('`', '``', $value) . '`';
    }
    protected function wrapJsonSelector($value)
    {
        [$field, $path] = $this->wrapJsonFieldAndPath($value);
        return 'json_unquote(json_extract(' . $field . $path . '))';
    }
    protected function wrapJsonBooleanSelector($value)
    {
        [$field, $path] = $this->wrapJsonFieldAndPath($value);
        return 'json_extract(' . $field . $path . ')';
    }
}
}

namespace Illuminate\Database\Query\Grammars {
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
class PostgresGrammar extends Grammar
{
    protected $operators = ['=', '<', '>', '<=', '>=', '<>', '!=', 'like', 'not like', 'between', 'ilike', 'not ilike', '~', '&', '|', '#', '<<', '>>', '<<=', '>>=', '&&', '@>', '<@', '?', '?|', '?&', '||', '-', '@?', '@@', '#-', 'is distinct from', 'is not distinct from'];
    protected $bitwiseOperators = ['~', '&', '|', '#', '<<', '>>', '<<=', '>>='];
    protected function whereBasic(Builder $query, $where)
    {
        if (Str::contains(strtolower($where['operator']), 'like')) {
            return sprintf('%s::text %s %s', $this->wrap($where['column']), $where['operator'], $this->parameter($where['value']));
        }
        return parent::whereBasic($query, $where);
    }
    protected function whereBitwise(Builder $query, $where)
    {
        $value = $this->parameter($where['value']);
        $operator = str_replace('?', '??', $where['operator']);
        return '(' . $this->wrap($where['column']) . ' ' . $operator . ' ' . $value . ')::bool';
    }
    protected function whereDate(Builder $query, $where)
    {
        $value = $this->parameter($where['value']);
        return $this->wrap($where['column']) . '::date ' . $where['operator'] . ' ' . $value;
    }
    protected function whereTime(Builder $query, $where)
    {
        $value = $this->parameter($where['value']);
        return $this->wrap($where['column']) . '::time ' . $where['operator'] . ' ' . $value;
    }
    protected function dateBasedWhere($type, Builder $query, $where)
    {
        $value = $this->parameter($where['value']);
        return 'extract(' . $type . ' from ' . $this->wrap($where['column']) . ') ' . $where['operator'] . ' ' . $value;
    }
    public function whereFullText(Builder $query, $where)
    {
        $language = $where['options']['language'] ?? 'english';
        if (!in_array($language, $this->validFullTextLanguages())) {
            $language = 'english';
        }
        $columns = collect($where['columns'])->map(function ($column) use($language) {
            return "to_tsvector('{$language}', {$this->wrap($column)})";
        })->implode(' || ');
        $mode = 'plainto_tsquery';
        if (($where['options']['mode'] ?? []) === 'phrase') {
            $mode = 'phraseto_tsquery';
        }
        if (($where['options']['mode'] ?? []) === 'websearch') {
            $mode = 'websearch_to_tsquery';
        }
        return "({$columns}) @@ {$mode}('{$language}', {$this->parameter($where['value'])})";
    }
    protected function validFullTextLanguages()
    {
        return ['simple', 'arabic', 'danish', 'dutch', 'english', 'finnish', 'french', 'german', 'hungarian', 'indonesian', 'irish', 'italian', 'lithuanian', 'nepali', 'norwegian', 'portuguese', 'romanian', 'russian', 'spanish', 'swedish', 'tamil', 'turkish'];
    }
    protected function compileColumns(Builder $query, $columns)
    {
        if (!is_null($query->aggregate)) {
            return;
        }
        if (is_array($query->distinct)) {
            $select = 'select distinct on (' . $this->columnize($query->distinct) . ') ';
        } elseif ($query->distinct) {
            $select = 'select distinct ';
        } else {
            $select = 'select ';
        }
        return $select . $this->columnize($columns);
    }
    protected function compileJsonContains($column, $value)
    {
        $column = str_replace('->>', '->', $this->wrap($column));
        return '(' . $column . ')::jsonb @> ' . $value;
    }
    protected function compileJsonLength($column, $operator, $value)
    {
        $column = str_replace('->>', '->', $this->wrap($column));
        return 'json_array_length((' . $column . ')::json) ' . $operator . ' ' . $value;
    }
    protected function compileHaving(array $having)
    {
        if ($having['type'] === 'Bitwise') {
            return $this->compileHavingBitwise($having);
        }
        return parent::compileHaving($having);
    }
    protected function compileHavingBitwise($having)
    {
        $column = $this->wrap($having['column']);
        $parameter = $this->parameter($having['value']);
        return $having['boolean'] . ' (' . $column . ' ' . $having['operator'] . ' ' . $parameter . ')::bool';
    }
    protected function compileLock(Builder $query, $value)
    {
        if (!is_string($value)) {
            return $value ? 'for update' : 'for share';
        }
        return $value;
    }
    public function compileInsertOrIgnore(Builder $query, array $values)
    {
        return $this->compileInsert($query, $values) . ' on conflict do nothing';
    }
    public function compileInsertGetId(Builder $query, $values, $sequence)
    {
        return $this->compileInsert($query, $values) . ' returning ' . $this->wrap($sequence ?: 'id');
    }
    public function compileUpdate(Builder $query, array $values)
    {
        if (isset($query->joins) || isset($query->limit)) {
            return $this->compileUpdateWithJoinsOrLimit($query, $values);
        }
        return parent::compileUpdate($query, $values);
    }
    protected function compileUpdateColumns(Builder $query, array $values)
    {
        return collect($values)->map(function ($value, $key) {
            $column = last(explode('.', $key));
            if ($this->isJsonSelector($key)) {
                return $this->compileJsonUpdateColumn($column, $value);
            }
            return $this->wrap($column) . ' = ' . $this->parameter($value);
        })->implode(', ');
    }
    public function compileUpsert(Builder $query, array $values, array $uniqueBy, array $update)
    {
        $sql = $this->compileInsert($query, $values);
        $sql .= ' on conflict (' . $this->columnize($uniqueBy) . ') do update set ';
        $columns = collect($update)->map(function ($value, $key) {
            return is_numeric($key) ? $this->wrap($value) . ' = ' . $this->wrapValue('excluded') . '.' . $this->wrap($value) : $this->wrap($key) . ' = ' . $this->parameter($value);
        })->implode(', ');
        return $sql . $columns;
    }
    protected function compileJsonUpdateColumn($key, $value)
    {
        $segments = explode('->', $key);
        $field = $this->wrap(array_shift($segments));
        $path = '\'{"' . implode('","', $segments) . '"}\'';
        return "{$field} = jsonb_set({$field}::jsonb, {$path}, {$this->parameter($value)})";
    }
    public function compileUpdateFrom(Builder $query, $values)
    {
        $table = $this->wrapTable($query->from);
        $columns = $this->compileUpdateColumns($query, $values);
        $from = '';
        if (isset($query->joins)) {
            $froms = collect($query->joins)->map(function ($join) {
                return $this->wrapTable($join->table);
            })->all();
            if (count($froms) > 0) {
                $from = ' from ' . implode(', ', $froms);
            }
        }
        $where = $this->compileUpdateWheres($query);
        return trim("update {$table} set {$columns}{$from} {$where}");
    }
    protected function compileUpdateWheres(Builder $query)
    {
        $baseWheres = $this->compileWheres($query);
        if (!isset($query->joins)) {
            return $baseWheres;
        }
        $joinWheres = $this->compileUpdateJoinWheres($query);
        if (trim($baseWheres) == '') {
            return 'where ' . $this->removeLeadingBoolean($joinWheres);
        }
        return $baseWheres . ' ' . $joinWheres;
    }
    protected function compileUpdateJoinWheres(Builder $query)
    {
        $joinWheres = [];
        foreach ($query->joins as $join) {
            foreach ($join->wheres as $where) {
                $method = "where{$where['type']}";
                $joinWheres[] = $where['boolean'] . ' ' . $this->{$method}($query, $where);
            }
        }
        return implode(' ', $joinWheres);
    }
    public function prepareBindingsForUpdateFrom(array $bindings, array $values)
    {
        $values = collect($values)->map(function ($value, $column) {
            return is_array($value) || $this->isJsonSelector($column) && !$this->isExpression($value) ? json_encode($value) : $value;
        })->all();
        $bindingsWithoutWhere = Arr::except($bindings, ['select', 'where']);
        return array_values(array_merge($values, $bindings['where'], Arr::flatten($bindingsWithoutWhere)));
    }
    protected function compileUpdateWithJoinsOrLimit(Builder $query, array $values)
    {
        $table = $this->wrapTable($query->from);
        $columns = $this->compileUpdateColumns($query, $values);
        $alias = last(preg_split('/\\s+as\\s+/i', $query->from));
        $selectSql = $this->compileSelect($query->select($alias . '.ctid'));
        return "update {$table} set {$columns} where {$this->wrap('ctid')} in ({$selectSql})";
    }
    public function prepareBindingsForUpdate(array $bindings, array $values)
    {
        $values = collect($values)->map(function ($value, $column) {
            return is_array($value) || $this->isJsonSelector($column) && !$this->isExpression($value) ? json_encode($value) : $value;
        })->all();
        $cleanBindings = Arr::except($bindings, 'select');
        return array_values(array_merge($values, Arr::flatten($cleanBindings)));
    }
    public function compileDelete(Builder $query)
    {
        if (isset($query->joins) || isset($query->limit)) {
            return $this->compileDeleteWithJoinsOrLimit($query);
        }
        return parent::compileDelete($query);
    }
    protected function compileDeleteWithJoinsOrLimit(Builder $query)
    {
        $table = $this->wrapTable($query->from);
        $alias = last(preg_split('/\\s+as\\s+/i', $query->from));
        $selectSql = $this->compileSelect($query->select($alias . '.ctid'));
        return "delete from {$table} where {$this->wrap('ctid')} in ({$selectSql})";
    }
    public function compileTruncate(Builder $query)
    {
        return ['truncate ' . $this->wrapTable($query->from) . ' restart identity cascade' => []];
    }
    protected function wrapJsonSelector($value)
    {
        $path = explode('->', $value);
        $field = $this->wrapSegments(explode('.', array_shift($path)));
        $wrappedPath = $this->wrapJsonPathAttributes($path);
        $attribute = array_pop($wrappedPath);
        if (!empty($wrappedPath)) {
            return $field . '->' . implode('->', $wrappedPath) . '->>' . $attribute;
        }
        return $field . '->>' . $attribute;
    }
    protected function wrapJsonBooleanSelector($value)
    {
        $selector = str_replace('->>', '->', $this->wrapJsonSelector($value));
        return '(' . $selector . ')::jsonb';
    }
    protected function wrapJsonBooleanValue($value)
    {
        return "'" . $value . "'::jsonb";
    }
    protected function wrapJsonPathAttributes($path)
    {
        return array_map(function ($attribute) {
            return filter_var($attribute, FILTER_VALIDATE_INT) !== false ? $attribute : "'{$attribute}'";
        }, $path);
    }
}
}

namespace Illuminate\Database\Query\Grammars {
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
class SQLiteGrammar extends Grammar
{
    protected $operators = ['=', '<', '>', '<=', '>=', '<>', '!=', 'like', 'not like', 'ilike', '&', '|', '<<', '>>'];
    protected function compileLock(Builder $query, $value)
    {
        return '';
    }
    protected function wrapUnion($sql)
    {
        return 'select * from (' . $sql . ')';
    }
    protected function whereDate(Builder $query, $where)
    {
        return $this->dateBasedWhere('%Y-%m-%d', $query, $where);
    }
    protected function whereDay(Builder $query, $where)
    {
        return $this->dateBasedWhere('%d', $query, $where);
    }
    protected function whereMonth(Builder $query, $where)
    {
        return $this->dateBasedWhere('%m', $query, $where);
    }
    protected function whereYear(Builder $query, $where)
    {
        return $this->dateBasedWhere('%Y', $query, $where);
    }
    protected function whereTime(Builder $query, $where)
    {
        return $this->dateBasedWhere('%H:%M:%S', $query, $where);
    }
    protected function dateBasedWhere($type, Builder $query, $where)
    {
        $value = $this->parameter($where['value']);
        return "strftime('{$type}', {$this->wrap($where['column'])}) {$where['operator']} cast({$value} as text)";
    }
    protected function compileJsonLength($column, $operator, $value)
    {
        [$field, $path] = $this->wrapJsonFieldAndPath($column);
        return 'json_array_length(' . $field . $path . ') ' . $operator . ' ' . $value;
    }
    public function compileUpdate(Builder $query, array $values)
    {
        if (isset($query->joins) || isset($query->limit)) {
            return $this->compileUpdateWithJoinsOrLimit($query, $values);
        }
        return parent::compileUpdate($query, $values);
    }
    public function compileInsertOrIgnore(Builder $query, array $values)
    {
        return Str::replaceFirst('insert', 'insert or ignore', $this->compileInsert($query, $values));
    }
    protected function compileUpdateColumns(Builder $query, array $values)
    {
        $jsonGroups = $this->groupJsonColumnsForUpdate($values);
        return collect($values)->reject(function ($value, $key) {
            return $this->isJsonSelector($key);
        })->merge($jsonGroups)->map(function ($value, $key) use($jsonGroups) {
            $column = last(explode('.', $key));
            $value = isset($jsonGroups[$key]) ? $this->compileJsonPatch($column, $value) : $this->parameter($value);
            return $this->wrap($column) . ' = ' . $value;
        })->implode(', ');
    }
    public function compileUpsert(Builder $query, array $values, array $uniqueBy, array $update)
    {
        $sql = $this->compileInsert($query, $values);
        $sql .= ' on conflict (' . $this->columnize($uniqueBy) . ') do update set ';
        $columns = collect($update)->map(function ($value, $key) {
            return is_numeric($key) ? $this->wrap($value) . ' = ' . $this->wrapValue('excluded') . '.' . $this->wrap($value) : $this->wrap($key) . ' = ' . $this->parameter($value);
        })->implode(', ');
        return $sql . $columns;
    }
    protected function groupJsonColumnsForUpdate(array $values)
    {
        $groups = [];
        foreach ($values as $key => $value) {
            if ($this->isJsonSelector($key)) {
                Arr::set($groups, str_replace('->', '.', Str::after($key, '.')), $value);
            }
        }
        return $groups;
    }
    protected function compileJsonPatch($column, $value)
    {
        return "json_patch(ifnull({$this->wrap($column)}, json('{}')), json({$this->parameter($value)}))";
    }
    protected function compileUpdateWithJoinsOrLimit(Builder $query, array $values)
    {
        $table = $this->wrapTable($query->from);
        $columns = $this->compileUpdateColumns($query, $values);
        $alias = last(preg_split('/\\s+as\\s+/i', $query->from));
        $selectSql = $this->compileSelect($query->select($alias . '.rowid'));
        return "update {$table} set {$columns} where {$this->wrap('rowid')} in ({$selectSql})";
    }
    public function prepareBindingsForUpdate(array $bindings, array $values)
    {
        $groups = $this->groupJsonColumnsForUpdate($values);
        $values = collect($values)->reject(function ($value, $key) {
            return $this->isJsonSelector($key);
        })->merge($groups)->map(function ($value) {
            return is_array($value) ? json_encode($value) : $value;
        })->all();
        $cleanBindings = Arr::except($bindings, 'select');
        return array_values(array_merge($values, Arr::flatten($cleanBindings)));
    }
    public function compileDelete(Builder $query)
    {
        if (isset($query->joins) || isset($query->limit)) {
            return $this->compileDeleteWithJoinsOrLimit($query);
        }
        return parent::compileDelete($query);
    }
    protected function compileDeleteWithJoinsOrLimit(Builder $query)
    {
        $table = $this->wrapTable($query->from);
        $alias = last(preg_split('/\\s+as\\s+/i', $query->from));
        $selectSql = $this->compileSelect($query->select($alias . '.rowid'));
        return "delete from {$table} where {$this->wrap('rowid')} in ({$selectSql})";
    }
    public function compileTruncate(Builder $query)
    {
        return ['delete from sqlite_sequence where name = ?' => [$query->from], 'delete from ' . $this->wrapTable($query->from) => []];
    }
    protected function wrapJsonSelector($value)
    {
        [$field, $path] = $this->wrapJsonFieldAndPath($value);
        return 'json_extract(' . $field . $path . ')';
    }
}
}

namespace Illuminate\Database\Query {
class Expression
{
    protected $value;
    public function __construct($value)
    {
        $this->value = $value;
    }
    public function getValue()
    {
        return $this->value;
    }
    public function __toString()
    {
        return (string) $this->getValue();
    }
}
}

namespace Illuminate\Database\Query\Processors {
class SQLiteProcessor extends Processor
{
    public function processColumnListing($results)
    {
        return array_map(function ($result) {
            return ((object) $result)->name;
        }, $results);
    }
}
}

namespace Illuminate\Database\Query\Processors {
use Illuminate\Database\Query\Builder;
class Processor
{
    public function processSelect(Builder $query, $results)
    {
        return $results;
    }
    public function processInsertGetId(Builder $query, $sql, $values, $sequence = null)
    {
        $query->getConnection()->insert($sql, $values);
        $id = $query->getConnection()->getPdo()->lastInsertId($sequence);
        return is_numeric($id) ? (int) $id : $id;
    }
    public function processColumnListing($results)
    {
        return $results;
    }
}
}

namespace Illuminate\Database\Query\Processors {
use Exception;
use Illuminate\Database\Connection;
use Illuminate\Database\Query\Builder;
class SqlServerProcessor extends Processor
{
    public function processInsertGetId(Builder $query, $sql, $values, $sequence = null)
    {
        $connection = $query->getConnection();
        $connection->insert($sql, $values);
        if ($connection->getConfig('odbc') === true) {
            $id = $this->processInsertGetIdForOdbc($connection);
        } else {
            $id = $connection->getPdo()->lastInsertId();
        }
        return is_numeric($id) ? (int) $id : $id;
    }
    protected function processInsertGetIdForOdbc(Connection $connection)
    {
        $result = $connection->selectFromWriteConnection('SELECT CAST(COALESCE(SCOPE_IDENTITY(), @@IDENTITY) AS int) AS insertid');
        if (!$result) {
            throw new Exception('Unable to retrieve lastInsertID for ODBC.');
        }
        $row = $result[0];
        return is_object($row) ? $row->insertid : $row['insertid'];
    }
    public function processColumnListing($results)
    {
        return array_map(function ($result) {
            return ((object) $result)->name;
        }, $results);
    }
}
}

namespace Illuminate\Database\Query\Processors {
use Illuminate\Database\Query\Builder;
class PostgresProcessor extends Processor
{
    public function processInsertGetId(Builder $query, $sql, $values, $sequence = null)
    {
        $connection = $query->getConnection();
        $connection->recordsHaveBeenModified();
        $result = $connection->selectFromWriteConnection($sql, $values)[0];
        $sequence = $sequence ?: 'id';
        $id = is_object($result) ? $result->{$sequence} : $result[$sequence];
        return is_numeric($id) ? (int) $id : $id;
    }
    public function processColumnListing($results)
    {
        return array_map(function ($result) {
            return ((object) $result)->column_name;
        }, $results);
    }
}
}

namespace Illuminate\Database\Query\Processors {
class MySqlProcessor extends Processor
{
    public function processColumnListing($results)
    {
        return array_map(function ($result) {
            return ((object) $result)->column_name;
        }, $results);
    }
}
}

namespace Illuminate\Database\Query {
use Closure;
class JoinClause extends Builder
{
    public $type;
    public $table;
    protected $parentConnection;
    protected $parentGrammar;
    protected $parentProcessor;
    protected $parentClass;
    public function __construct(Builder $parentQuery, $type, $table)
    {
        $this->type = $type;
        $this->table = $table;
        $this->parentClass = get_class($parentQuery);
        $this->parentGrammar = $parentQuery->getGrammar();
        $this->parentProcessor = $parentQuery->getProcessor();
        $this->parentConnection = $parentQuery->getConnection();
        parent::__construct($this->parentConnection, $this->parentGrammar, $this->parentProcessor);
    }
    public function on($first, $operator = null, $second = null, $boolean = 'and')
    {
        if ($first instanceof Closure) {
            return $this->whereNested($first, $boolean);
        }
        return $this->whereColumn($first, $operator, $second, $boolean);
    }
    public function orOn($first, $operator = null, $second = null)
    {
        return $this->on($first, $operator, $second, 'or');
    }
    public function newQuery()
    {
        return new static($this->newParentQuery(), $this->type, $this->table);
    }
    protected function forSubQuery()
    {
        return $this->newParentQuery()->newQuery();
    }
    protected function newParentQuery()
    {
        $class = $this->parentClass;
        return new $class($this->parentConnection, $this->parentGrammar, $this->parentProcessor);
    }
}
}

namespace Illuminate\Database {
use Closure;
interface ConnectionInterface
{
    public function table($table, $as = null);
    public function raw($value);
    public function selectOne($query, $bindings = [], $useReadPdo = true);
    public function select($query, $bindings = [], $useReadPdo = true);
    public function cursor($query, $bindings = [], $useReadPdo = true);
    public function insert($query, $bindings = []);
    public function update($query, $bindings = []);
    public function delete($query, $bindings = []);
    public function statement($query, $bindings = []);
    public function affectingStatement($query, $bindings = []);
    public function unprepared($query);
    public function prepareBindings(array $bindings);
    public function transaction(Closure $callback, $attempts = 1);
    public function beginTransaction();
    public function commit();
    public function rollBack();
    public function transactionLevel();
    public function pretend(Closure $callback);
    public function getDatabaseName();
}
}

namespace Illuminate\Database {
use Doctrine\DBAL\Driver\PDOSqlite\Driver as DoctrineDriver;
use Doctrine\DBAL\Version;
use Illuminate\Database\PDO\SQLiteDriver;
use Illuminate\Database\Query\Grammars\SQLiteGrammar as QueryGrammar;
use Illuminate\Database\Query\Processors\SQLiteProcessor;
use Illuminate\Database\Schema\Grammars\SQLiteGrammar as SchemaGrammar;
use Illuminate\Database\Schema\SQLiteBuilder;
use Illuminate\Database\Schema\SqliteSchemaState;
use Illuminate\Filesystem\Filesystem;
class SQLiteConnection extends Connection
{
    public function __construct($pdo, $database = '', $tablePrefix = '', array $config = [])
    {
        parent::__construct($pdo, $database, $tablePrefix, $config);
        $enableForeignKeyConstraints = $this->getForeignKeyConstraintsConfigurationValue();
        if ($enableForeignKeyConstraints === null) {
            return;
        }
        $enableForeignKeyConstraints ? $this->getSchemaBuilder()->enableForeignKeyConstraints() : $this->getSchemaBuilder()->disableForeignKeyConstraints();
    }
    protected function getDefaultQueryGrammar()
    {
        return $this->withTablePrefix(new QueryGrammar());
    }
    public function getSchemaBuilder()
    {
        if (is_null($this->schemaGrammar)) {
            $this->useDefaultSchemaGrammar();
        }
        return new SQLiteBuilder($this);
    }
    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new SchemaGrammar());
    }
    public function getSchemaState(Filesystem $files = null, callable $processFactory = null)
    {
        return new SqliteSchemaState($this, $files, $processFactory);
    }
    protected function getDefaultPostProcessor()
    {
        return new SQLiteProcessor();
    }
    protected function getDoctrineDriver()
    {
        return class_exists(Version::class) ? new DoctrineDriver() : new SQLiteDriver();
    }
    protected function getForeignKeyConstraintsConfigurationValue()
    {
        return $this->getConfig('foreign_key_constraints');
    }
}
}

namespace Illuminate\Database\Connectors {
use Illuminate\Contracts\Container\Container;
use Illuminate\Database\Connection;
use Illuminate\Database\MySqlConnection;
use Illuminate\Database\PostgresConnection;
use Illuminate\Database\SQLiteConnection;
use Illuminate\Database\SqlServerConnection;
use Illuminate\Support\Arr;
use InvalidArgumentException;
use PDOException;
class ConnectionFactory
{
    protected $container;
    public function __construct(Container $container)
    {
        $this->container = $container;
    }
    public function make(array $config, $name = null)
    {
        $config = $this->parseConfig($config, $name);
        if (isset($config['read'])) {
            return $this->createReadWriteConnection($config);
        }
        return $this->createSingleConnection($config);
    }
    protected function parseConfig(array $config, $name)
    {
        return Arr::add(Arr::add($config, 'prefix', ''), 'name', $name);
    }
    protected function createSingleConnection(array $config)
    {
        $pdo = $this->createPdoResolver($config);
        return $this->createConnection($config['driver'], $pdo, $config['database'], $config['prefix'], $config);
    }
    protected function createReadWriteConnection(array $config)
    {
        $connection = $this->createSingleConnection($this->getWriteConfig($config));
        return $connection->setReadPdo($this->createReadPdo($config));
    }
    protected function createReadPdo(array $config)
    {
        return $this->createPdoResolver($this->getReadConfig($config));
    }
    protected function getReadConfig(array $config)
    {
        return $this->mergeReadWriteConfig($config, $this->getReadWriteConfig($config, 'read'));
    }
    protected function getWriteConfig(array $config)
    {
        return $this->mergeReadWriteConfig($config, $this->getReadWriteConfig($config, 'write'));
    }
    protected function getReadWriteConfig(array $config, $type)
    {
        return isset($config[$type][0]) ? Arr::random($config[$type]) : $config[$type];
    }
    protected function mergeReadWriteConfig(array $config, array $merge)
    {
        return Arr::except(array_merge($config, $merge), ['read', 'write']);
    }
    protected function createPdoResolver(array $config)
    {
        return array_key_exists('host', $config) ? $this->createPdoResolverWithHosts($config) : $this->createPdoResolverWithoutHosts($config);
    }
    protected function createPdoResolverWithHosts(array $config)
    {
        return function () use($config) {
            foreach (Arr::shuffle($hosts = $this->parseHosts($config)) as $key => $host) {
                $config['host'] = $host;
                try {
                    return $this->createConnector($config)->connect($config);
                } catch (PDOException $e) {
                    continue;
                }
            }
            throw $e;
        };
    }
    protected function parseHosts(array $config)
    {
        $hosts = Arr::wrap($config['host']);
        if (empty($hosts)) {
            throw new InvalidArgumentException('Database hosts array is empty.');
        }
        return $hosts;
    }
    protected function createPdoResolverWithoutHosts(array $config)
    {
        return function () use($config) {
            return $this->createConnector($config)->connect($config);
        };
    }
    public function createConnector(array $config)
    {
        if (!isset($config['driver'])) {
            throw new InvalidArgumentException('A driver must be specified.');
        }
        if ($this->container->bound($key = "db.connector.{$config['driver']}")) {
            return $this->container->make($key);
        }
        switch ($config['driver']) {
            case 'mysql':
                return new MySqlConnector();
            case 'pgsql':
                return new PostgresConnector();
            case 'sqlite':
                return new SQLiteConnector();
            case 'sqlsrv':
                return new SqlServerConnector();
        }
        throw new InvalidArgumentException("Unsupported driver [{$config['driver']}].");
    }
    protected function createConnection($driver, $connection, $database, $prefix = '', array $config = [])
    {
        if ($resolver = Connection::getResolver($driver)) {
            return $resolver($connection, $database, $prefix, $config);
        }
        switch ($driver) {
            case 'mysql':
                return new MySqlConnection($connection, $database, $prefix, $config);
            case 'pgsql':
                return new PostgresConnection($connection, $database, $prefix, $config);
            case 'sqlite':
                return new SQLiteConnection($connection, $database, $prefix, $config);
            case 'sqlsrv':
                return new SqlServerConnection($connection, $database, $prefix, $config);
        }
        throw new InvalidArgumentException("Unsupported driver [{$driver}].");
    }
}
}

namespace Illuminate\Database\Connectors {
use Illuminate\Support\Arr;
use PDO;
class SqlServerConnector extends Connector implements ConnectorInterface
{
    protected $options = [PDO::ATTR_CASE => PDO::CASE_NATURAL, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL, PDO::ATTR_STRINGIFY_FETCHES => false];
    public function connect(array $config)
    {
        $options = $this->getOptions($config);
        return $this->createConnection($this->getDsn($config), $config, $options);
    }
    protected function getDsn(array $config)
    {
        if ($this->prefersOdbc($config)) {
            return $this->getOdbcDsn($config);
        }
        if (in_array('sqlsrv', $this->getAvailableDrivers())) {
            return $this->getSqlSrvDsn($config);
        } else {
            return $this->getDblibDsn($config);
        }
    }
    protected function prefersOdbc(array $config)
    {
        return in_array('odbc', $this->getAvailableDrivers()) && ($config['odbc'] ?? null) === true;
    }
    protected function getDblibDsn(array $config)
    {
        return $this->buildConnectString('dblib', array_merge(['host' => $this->buildHostString($config, ':'), 'dbname' => $config['database']], Arr::only($config, ['appname', 'charset', 'version'])));
    }
    protected function getOdbcDsn(array $config)
    {
        return isset($config['odbc_datasource_name']) ? 'odbc:' . $config['odbc_datasource_name'] : '';
    }
    protected function getSqlSrvDsn(array $config)
    {
        $arguments = ['Server' => $this->buildHostString($config, ',')];
        if (isset($config['database'])) {
            $arguments['Database'] = $config['database'];
        }
        if (isset($config['readonly'])) {
            $arguments['ApplicationIntent'] = 'ReadOnly';
        }
        if (isset($config['pooling']) && $config['pooling'] === false) {
            $arguments['ConnectionPooling'] = '0';
        }
        if (isset($config['appname'])) {
            $arguments['APP'] = $config['appname'];
        }
        if (isset($config['encrypt'])) {
            $arguments['Encrypt'] = $config['encrypt'];
        }
        if (isset($config['trust_server_certificate'])) {
            $arguments['TrustServerCertificate'] = $config['trust_server_certificate'];
        }
        if (isset($config['multiple_active_result_sets']) && $config['multiple_active_result_sets'] === false) {
            $arguments['MultipleActiveResultSets'] = 'false';
        }
        if (isset($config['transaction_isolation'])) {
            $arguments['TransactionIsolation'] = $config['transaction_isolation'];
        }
        if (isset($config['multi_subnet_failover'])) {
            $arguments['MultiSubnetFailover'] = $config['multi_subnet_failover'];
        }
        if (isset($config['column_encryption'])) {
            $arguments['ColumnEncryption'] = $config['column_encryption'];
        }
        if (isset($config['key_store_authentication'])) {
            $arguments['KeyStoreAuthentication'] = $config['key_store_authentication'];
        }
        if (isset($config['key_store_principal_id'])) {
            $arguments['KeyStorePrincipalId'] = $config['key_store_principal_id'];
        }
        if (isset($config['key_store_secret'])) {
            $arguments['KeyStoreSecret'] = $config['key_store_secret'];
        }
        if (isset($config['login_timeout'])) {
            $arguments['LoginTimeout'] = $config['login_timeout'];
        }
        return $this->buildConnectString('sqlsrv', $arguments);
    }
    protected function buildConnectString($driver, array $arguments)
    {
        return $driver . ':' . implode(';', array_map(function ($key) use($arguments) {
            return sprintf('%s=%s', $key, $arguments[$key]);
        }, array_keys($arguments)));
    }
    protected function buildHostString(array $config, $separator)
    {
        if (empty($config['port'])) {
            return $config['host'];
        }
        return $config['host'] . $separator . $config['port'];
    }
    protected function getAvailableDrivers()
    {
        return PDO::getAvailableDrivers();
    }
}
}

namespace Illuminate\Database\Connectors {
use PDO;
class PostgresConnector extends Connector implements ConnectorInterface
{
    protected $options = [PDO::ATTR_CASE => PDO::CASE_NATURAL, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL, PDO::ATTR_STRINGIFY_FETCHES => false];
    public function connect(array $config)
    {
        $connection = $this->createConnection($this->getDsn($config), $config, $this->getOptions($config));
        $this->configureIsolationLevel($connection, $config);
        $this->configureEncoding($connection, $config);
        $this->configureTimezone($connection, $config);
        $this->configureSchema($connection, $config);
        $this->configureApplicationName($connection, $config);
        $this->configureSynchronousCommit($connection, $config);
        return $connection;
    }
    protected function configureIsolationLevel($connection, array $config)
    {
        if (isset($config['isolation_level'])) {
            $connection->prepare("set session characteristics as transaction isolation level {$config['isolation_level']}")->execute();
        }
    }
    protected function configureEncoding($connection, $config)
    {
        if (!isset($config['charset'])) {
            return;
        }
        $connection->prepare("set names '{$config['charset']}'")->execute();
    }
    protected function configureTimezone($connection, array $config)
    {
        if (isset($config['timezone'])) {
            $timezone = $config['timezone'];
            $connection->prepare("set time zone '{$timezone}'")->execute();
        }
    }
    protected function configureSchema($connection, $config)
    {
        if (isset($config['schema'])) {
            $schema = $this->formatSchema($config['schema']);
            $connection->prepare("set search_path to {$schema}")->execute();
        }
    }
    protected function formatSchema($schema)
    {
        if (is_array($schema)) {
            return '"' . implode('", "', $schema) . '"';
        }
        return '"' . $schema . '"';
    }
    protected function configureApplicationName($connection, $config)
    {
        if (isset($config['application_name'])) {
            $applicationName = $config['application_name'];
            $connection->prepare("set application_name to '{$applicationName}'")->execute();
        }
    }
    protected function getDsn(array $config)
    {
        extract($config, EXTR_SKIP);
        $host = isset($host) ? "host={$host};" : '';
        $dsn = "pgsql:{$host}dbname='{$database}'";
        if (isset($config['port'])) {
            $dsn .= ";port={$port}";
        }
        return $this->addSslOptions($dsn, $config);
    }
    protected function addSslOptions($dsn, array $config)
    {
        foreach (['sslmode', 'sslcert', 'sslkey', 'sslrootcert'] as $option) {
            if (isset($config[$option])) {
                $dsn .= ";{$option}={$config[$option]}";
            }
        }
        return $dsn;
    }
    protected function configureSynchronousCommit($connection, array $config)
    {
        if (!isset($config['synchronous_commit'])) {
            return;
        }
        $connection->prepare("set synchronous_commit to '{$config['synchronous_commit']}'")->execute();
    }
}
}

namespace Illuminate\Database\Connectors {
interface ConnectorInterface
{
    public function connect(array $config);
}
}

namespace Illuminate\Database\Connectors {
use PDO;
class MySqlConnector extends Connector implements ConnectorInterface
{
    public function connect(array $config)
    {
        $dsn = $this->getDsn($config);
        $options = $this->getOptions($config);
        $connection = $this->createConnection($dsn, $config, $options);
        if (!empty($config['database'])) {
            $connection->exec("use `{$config['database']}`;");
        }
        $this->configureIsolationLevel($connection, $config);
        $this->configureEncoding($connection, $config);
        $this->configureTimezone($connection, $config);
        $this->setModes($connection, $config);
        return $connection;
    }
    protected function configureIsolationLevel($connection, array $config)
    {
        if (!isset($config['isolation_level'])) {
            return;
        }
        $connection->prepare("SET SESSION TRANSACTION ISOLATION LEVEL {$config['isolation_level']}")->execute();
    }
    protected function configureEncoding($connection, array $config)
    {
        if (!isset($config['charset'])) {
            return $connection;
        }
        $connection->prepare("set names '{$config['charset']}'" . $this->getCollation($config))->execute();
    }
    protected function getCollation(array $config)
    {
        return isset($config['collation']) ? " collate '{$config['collation']}'" : '';
    }
    protected function configureTimezone($connection, array $config)
    {
        if (isset($config['timezone'])) {
            $connection->prepare('set time_zone="' . $config['timezone'] . '"')->execute();
        }
    }
    protected function getDsn(array $config)
    {
        return $this->hasSocket($config) ? $this->getSocketDsn($config) : $this->getHostDsn($config);
    }
    protected function hasSocket(array $config)
    {
        return isset($config['unix_socket']) && !empty($config['unix_socket']);
    }
    protected function getSocketDsn(array $config)
    {
        return "mysql:unix_socket={$config['unix_socket']};dbname={$config['database']}";
    }
    protected function getHostDsn(array $config)
    {
        extract($config, EXTR_SKIP);
        return isset($port) ? "mysql:host={$host};port={$port};dbname={$database}" : "mysql:host={$host};dbname={$database}";
    }
    protected function setModes(PDO $connection, array $config)
    {
        if (isset($config['modes'])) {
            $this->setCustomModes($connection, $config);
        } elseif (isset($config['strict'])) {
            if ($config['strict']) {
                $connection->prepare($this->strictMode($connection, $config))->execute();
            } else {
                $connection->prepare("set session sql_mode='NO_ENGINE_SUBSTITUTION'")->execute();
            }
        }
    }
    protected function setCustomModes(PDO $connection, array $config)
    {
        $modes = implode(',', $config['modes']);
        $connection->prepare("set session sql_mode='{$modes}'")->execute();
    }
    protected function strictMode(PDO $connection, $config)
    {
        $version = $config['version'] ?? $connection->getAttribute(PDO::ATTR_SERVER_VERSION);
        if (version_compare($version, '8.0.11') >= 0) {
            return "set session sql_mode='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION'";
        }
        return "set session sql_mode='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'";
    }
}
}

namespace Illuminate\Database\Connectors {
use InvalidArgumentException;
class SQLiteConnector extends Connector implements ConnectorInterface
{
    public function connect(array $config)
    {
        $options = $this->getOptions($config);
        if ($config['database'] === ':memory:') {
            return $this->createConnection('sqlite::memory:', $config, $options);
        }
        $path = realpath($config['database']);
        if ($path === false) {
            throw new InvalidArgumentException("Database ({$config['database']}) does not exist.");
        }
        return $this->createConnection("sqlite:{$path}", $config, $options);
    }
}
}

namespace Illuminate\Database {
use Doctrine\DBAL\Driver\PDOMySql\Driver as DoctrineDriver;
use Doctrine\DBAL\Version;
use Illuminate\Database\PDO\MySqlDriver;
use Illuminate\Database\Query\Grammars\MySqlGrammar as QueryGrammar;
use Illuminate\Database\Query\Processors\MySqlProcessor;
use Illuminate\Database\Schema\Grammars\MySqlGrammar as SchemaGrammar;
use Illuminate\Database\Schema\MySqlBuilder;
use Illuminate\Database\Schema\MySqlSchemaState;
use Illuminate\Filesystem\Filesystem;
use PDO;
class MySqlConnection extends Connection
{
    public function isMaria()
    {
        return strpos($this->getPdo()->getAttribute(PDO::ATTR_SERVER_VERSION), 'MariaDB') !== false;
    }
    protected function getDefaultQueryGrammar()
    {
        return $this->withTablePrefix(new QueryGrammar());
    }
    public function getSchemaBuilder()
    {
        if (is_null($this->schemaGrammar)) {
            $this->useDefaultSchemaGrammar();
        }
        return new MySqlBuilder($this);
    }
    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new SchemaGrammar());
    }
    public function getSchemaState(Filesystem $files = null, callable $processFactory = null)
    {
        return new MySqlSchemaState($this, $files, $processFactory);
    }
    protected function getDefaultPostProcessor()
    {
        return new MySqlProcessor();
    }
    protected function getDoctrineDriver()
    {
        return class_exists(Version::class) ? new DoctrineDriver() : new MySqlDriver();
    }
}
}

namespace Illuminate\Database {
use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGenerator;
use Illuminate\Contracts\Queue\EntityResolver;
use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\QueueEntityResolver;
use Illuminate\Support\ServiceProvider;
class DatabaseServiceProvider extends ServiceProvider
{
    protected static $fakers = [];
    public function boot()
    {
        Model::setConnectionResolver($this->app['db']);
        Model::setEventDispatcher($this->app['events']);
    }
    public function register()
    {
        Model::clearBootedModels();
        $this->registerConnectionServices();
        $this->registerEloquentFactory();
        $this->registerQueueableEntityResolver();
    }
    protected function registerConnectionServices()
    {
        $this->app->singleton('db.factory', function ($app) {
            return new ConnectionFactory($app);
        });
        $this->app->singleton('db', function ($app) {
            return new DatabaseManager($app, $app['db.factory']);
        });
        $this->app->bind('db.connection', function ($app) {
            return $app['db']->connection();
        });
        $this->app->singleton('db.transactions', function ($app) {
            return new DatabaseTransactionsManager();
        });
    }
    protected function registerEloquentFactory()
    {
        $this->app->singleton(FakerGenerator::class, function ($app, $parameters) {
            $locale = $parameters['locale'] ?? $app['config']->get('app.faker_locale', 'en_US');
            if (!isset(static::$fakers[$locale])) {
                static::$fakers[$locale] = FakerFactory::create($locale);
            }
            static::$fakers[$locale]->unique(true);
            return static::$fakers[$locale];
        });
    }
    protected function registerQueueableEntityResolver()
    {
        $this->app->singleton(EntityResolver::class, function () {
            return new QueueEntityResolver();
        });
    }
}
}

namespace Illuminate\Database\Events {
abstract class ConnectionEvent
{
    public $connectionName;
    public $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->connectionName = $connection->getName();
    }
}
}

namespace Illuminate\Database\Events {
class TransactionCommitted extends ConnectionEvent
{
}
}

namespace Illuminate\Database\Events {
class TransactionBeginning extends ConnectionEvent
{
}
}

namespace Illuminate\Database\Events {
class TransactionRolledBack extends ConnectionEvent
{
}
}

namespace Illuminate\Database\Events {
class QueryExecuted
{
    public $sql;
    public $bindings;
    public $time;
    public $connection;
    public $connectionName;
    public function __construct($sql, $bindings, $time, $connection)
    {
        $this->sql = $sql;
        $this->time = $time;
        $this->bindings = $bindings;
        $this->connection = $connection;
        $this->connectionName = $connection->getName();
    }
}
}

namespace Illuminate\Database\Migrations {
use Doctrine\DBAL\Schema\SchemaException;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\ConnectionResolverInterface as Resolver;
use Illuminate\Database\Events\MigrationEnded;
use Illuminate\Database\Events\MigrationsEnded;
use Illuminate\Database\Events\MigrationsStarted;
use Illuminate\Database\Events\MigrationStarted;
use Illuminate\Database\Events\NoPendingMigrations;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use ReflectionClass;
use Symfony\Component\Console\Output\OutputInterface;
class Migrator
{
    protected $events;
    protected $repository;
    protected $files;
    protected $resolver;
    protected $connection;
    protected $paths = [];
    protected $output;
    public function __construct(MigrationRepositoryInterface $repository, Resolver $resolver, Filesystem $files, Dispatcher $dispatcher = null)
    {
        $this->files = $files;
        $this->events = $dispatcher;
        $this->resolver = $resolver;
        $this->repository = $repository;
    }
    public function run($paths = [], array $options = [])
    {
        $files = $this->getMigrationFiles($paths);
        $this->requireFiles($migrations = $this->pendingMigrations($files, $this->repository->getRan()));
        $this->runPending($migrations, $options);
        return $migrations;
    }
    protected function pendingMigrations($files, $ran)
    {
        return Collection::make($files)->reject(function ($file) use($ran) {
            return in_array($this->getMigrationName($file), $ran);
        })->values()->all();
    }
    public function runPending(array $migrations, array $options = [])
    {
        if (count($migrations) === 0) {
            $this->fireMigrationEvent(new NoPendingMigrations('up'));
            $this->note('<info>Nothing to migrate.</info>');
            return;
        }
        $batch = $this->repository->getNextBatchNumber();
        $pretend = $options['pretend'] ?? false;
        $step = $options['step'] ?? false;
        $this->fireMigrationEvent(new MigrationsStarted('up'));
        foreach ($migrations as $file) {
            $this->runUp($file, $batch, $pretend);
            if ($step) {
                $batch++;
            }
        }
        $this->fireMigrationEvent(new MigrationsEnded('up'));
    }
    protected function runUp($file, $batch, $pretend)
    {
        $migration = $this->resolvePath($file);
        $name = $this->getMigrationName($file);
        if ($pretend) {
            return $this->pretendToRun($migration, 'up');
        }
        $this->note("<comment>Migrating:</comment> {$name}");
        $startTime = microtime(true);
        $this->runMigration($migration, 'up');
        $runTime = number_format((microtime(true) - $startTime) * 1000, 2);
        $this->repository->log($name, $batch);
        $this->note("<info>Migrated:</info>  {$name} ({$runTime}ms)");
    }
    public function rollback($paths = [], array $options = [])
    {
        $migrations = $this->getMigrationsForRollback($options);
        if (count($migrations) === 0) {
            $this->fireMigrationEvent(new NoPendingMigrations('down'));
            $this->note('<info>Nothing to rollback.</info>');
            return [];
        }
        return $this->rollbackMigrations($migrations, $paths, $options);
    }
    protected function getMigrationsForRollback(array $options)
    {
        if (($steps = $options['step'] ?? 0) > 0) {
            return $this->repository->getMigrations($steps);
        }
        return $this->repository->getLast();
    }
    protected function rollbackMigrations(array $migrations, $paths, array $options)
    {
        $rolledBack = [];
        $this->requireFiles($files = $this->getMigrationFiles($paths));
        $this->fireMigrationEvent(new MigrationsStarted('down'));
        foreach ($migrations as $migration) {
            $migration = (object) $migration;
            if (!($file = Arr::get($files, $migration->migration))) {
                $this->note("<fg=red>Migration not found:</> {$migration->migration}");
                continue;
            }
            $rolledBack[] = $file;
            $this->runDown($file, $migration, $options['pretend'] ?? false);
        }
        $this->fireMigrationEvent(new MigrationsEnded('down'));
        return $rolledBack;
    }
    public function reset($paths = [], $pretend = false)
    {
        $migrations = array_reverse($this->repository->getRan());
        if (count($migrations) === 0) {
            $this->note('<info>Nothing to rollback.</info>');
            return [];
        }
        return $this->resetMigrations($migrations, $paths, $pretend);
    }
    protected function resetMigrations(array $migrations, array $paths, $pretend = false)
    {
        $migrations = collect($migrations)->map(function ($m) {
            return (object) ['migration' => $m];
        })->all();
        return $this->rollbackMigrations($migrations, $paths, compact('pretend'));
    }
    protected function runDown($file, $migration, $pretend)
    {
        $instance = $this->resolvePath($file);
        $name = $this->getMigrationName($file);
        $this->note("<comment>Rolling back:</comment> {$name}");
        if ($pretend) {
            return $this->pretendToRun($instance, 'down');
        }
        $startTime = microtime(true);
        $this->runMigration($instance, 'down');
        $runTime = number_format((microtime(true) - $startTime) * 1000, 2);
        $this->repository->delete($migration);
        $this->note("<info>Rolled back:</info>  {$name} ({$runTime}ms)");
    }
    protected function runMigration($migration, $method)
    {
        $connection = $this->resolveConnection($migration->getConnection());
        $callback = function () use($connection, $migration, $method) {
            if (method_exists($migration, $method)) {
                $this->fireMigrationEvent(new MigrationStarted($migration, $method));
                $this->runMethod($connection, $migration, $method);
                $this->fireMigrationEvent(new MigrationEnded($migration, $method));
            }
        };
        $this->getSchemaGrammar($connection)->supportsSchemaTransactions() && $migration->withinTransaction ? $connection->transaction($callback) : $callback();
    }
    protected function pretendToRun($migration, $method)
    {
        try {
            foreach ($this->getQueries($migration, $method) as $query) {
                $name = get_class($migration);
                $reflectionClass = new ReflectionClass($migration);
                if ($reflectionClass->isAnonymous()) {
                    $name = $this->getMigrationName($reflectionClass->getFileName());
                }
                $this->note("<info>{$name}:</info> {$query['query']}");
            }
        } catch (SchemaException $e) {
            $name = get_class($migration);
            $this->note("<info>{$name}:</info> failed to dump queries. This may be due to changing database columns using Doctrine, which is not supported while pretending to run migrations.");
        }
    }
    protected function getQueries($migration, $method)
    {
        $db = $this->resolveConnection($migration->getConnection());
        return $db->pretend(function () use($db, $migration, $method) {
            if (method_exists($migration, $method)) {
                $this->runMethod($db, $migration, $method);
            }
        });
    }
    protected function runMethod($connection, $migration, $method)
    {
        $previousConnection = $this->resolver->getDefaultConnection();
        try {
            $this->resolver->setDefaultConnection($connection->getName());
            $migration->{$method}();
        } finally {
            $this->resolver->setDefaultConnection($previousConnection);
        }
    }
    public function resolve($file)
    {
        $class = $this->getMigrationClass($file);
        return new $class();
    }
    protected function resolvePath(string $path)
    {
        $class = $this->getMigrationClass($this->getMigrationName($path));
        if (class_exists($class) && realpath($path) == (new ReflectionClass($class))->getFileName()) {
            return new $class();
        }
        $migration = $this->files->getRequire($path);
        return is_object($migration) ? $migration : new $class();
    }
    protected function getMigrationClass(string $migrationName) : string
    {
        return Str::studly(implode('_', array_slice(explode('_', $migrationName), 4)));
    }
    public function getMigrationFiles($paths)
    {
        return Collection::make($paths)->flatMap(function ($path) {
            return Str::endsWith($path, '.php') ? [$path] : $this->files->glob($path . '/*_*.php');
        })->filter()->values()->keyBy(function ($file) {
            return $this->getMigrationName($file);
        })->sortBy(function ($file, $key) {
            return $key;
        })->all();
    }
    public function requireFiles(array $files)
    {
        foreach ($files as $file) {
            $this->files->requireOnce($file);
        }
    }
    public function getMigrationName($path)
    {
        return str_replace('.php', '', basename($path));
    }
    public function path($path)
    {
        $this->paths = array_unique(array_merge($this->paths, [$path]));
    }
    public function paths()
    {
        return $this->paths;
    }
    public function getConnection()
    {
        return $this->connection;
    }
    public function usingConnection($name, callable $callback)
    {
        $previousConnection = $this->resolver->getDefaultConnection();
        $this->setConnection($name);
        return tap($callback(), function () use($previousConnection) {
            $this->setConnection($previousConnection);
        });
    }
    public function setConnection($name)
    {
        if (!is_null($name)) {
            $this->resolver->setDefaultConnection($name);
        }
        $this->repository->setSource($name);
        $this->connection = $name;
    }
    public function resolveConnection($connection)
    {
        return $this->resolver->connection($connection ?: $this->connection);
    }
    protected function getSchemaGrammar($connection)
    {
        if (is_null($grammar = $connection->getSchemaGrammar())) {
            $connection->useDefaultSchemaGrammar();
            $grammar = $connection->getSchemaGrammar();
        }
        return $grammar;
    }
    public function getRepository()
    {
        return $this->repository;
    }
    public function repositoryExists()
    {
        return $this->repository->repositoryExists();
    }
    public function hasRunAnyMigrations()
    {
        return $this->repositoryExists() && count($this->repository->getRan()) > 0;
    }
    public function deleteRepository()
    {
        return $this->repository->deleteRepository();
    }
    public function getFilesystem()
    {
        return $this->files;
    }
    public function setOutput(OutputInterface $output)
    {
        $this->output = $output;
        return $this;
    }
    protected function note($message)
    {
        if ($this->output) {
            $this->output->writeln($message);
        }
    }
    public function fireMigrationEvent($event)
    {
        if ($this->events) {
            $this->events->dispatch($event);
        }
    }
}
}

namespace Illuminate\Database\Migrations {
abstract class Migration
{
    protected $connection;
    public $withinTransaction = true;
    public function getConnection()
    {
        return $this->connection;
    }
}
}

namespace Illuminate\Database\Migrations {
interface MigrationRepositoryInterface
{
    public function getRan();
    public function getMigrations($steps);
    public function getLast();
    public function getMigrationBatches();
    public function log($file, $batch);
    public function delete($migration);
    public function getNextBatchNumber();
    public function createRepository();
    public function repositoryExists();
    public function deleteRepository();
    public function setSource($name);
}
}

namespace Illuminate\Database\Migrations {
use Illuminate\Database\ConnectionResolverInterface as Resolver;
class DatabaseMigrationRepository implements MigrationRepositoryInterface
{
    protected $resolver;
    protected $table;
    protected $connection;
    public function __construct(Resolver $resolver, $table)
    {
        $this->table = $table;
        $this->resolver = $resolver;
    }
    public function getRan()
    {
        return $this->table()->orderBy('batch', 'asc')->orderBy('migration', 'asc')->pluck('migration')->all();
    }
    public function getMigrations($steps)
    {
        $query = $this->table()->where('batch', '>=', '1');
        return $query->orderBy('batch', 'desc')->orderBy('migration', 'desc')->take($steps)->get()->all();
    }
    public function getLast()
    {
        $query = $this->table()->where('batch', $this->getLastBatchNumber());
        return $query->orderBy('migration', 'desc')->get()->all();
    }
    public function getMigrationBatches()
    {
        return $this->table()->orderBy('batch', 'asc')->orderBy('migration', 'asc')->pluck('batch', 'migration')->all();
    }
    public function log($file, $batch)
    {
        $record = ['migration' => $file, 'batch' => $batch];
        $this->table()->insert($record);
    }
    public function delete($migration)
    {
        $this->table()->where('migration', $migration->migration)->delete();
    }
    public function getNextBatchNumber()
    {
        return $this->getLastBatchNumber() + 1;
    }
    public function getLastBatchNumber()
    {
        return $this->table()->max('batch');
    }
    public function createRepository()
    {
        $schema = $this->getConnection()->getSchemaBuilder();
        $schema->create($this->table, function ($table) {
            $table->increments('id');
            $table->string('migration');
            $table->integer('batch');
        });
    }
    public function repositoryExists()
    {
        $schema = $this->getConnection()->getSchemaBuilder();
        return $schema->hasTable($this->table);
    }
    public function deleteRepository()
    {
        $schema = $this->getConnection()->getSchemaBuilder();
        $schema->drop($this->table);
    }
    protected function table()
    {
        return $this->getConnection()->table($this->table)->useWritePdo();
    }
    public function getConnectionResolver()
    {
        return $this->resolver;
    }
    public function getConnection()
    {
        return $this->resolver->connection($this->connection);
    }
    public function setSource($name)
    {
        $this->connection = $name;
    }
}
}

namespace Illuminate\Database\Schema {
use BadMethodCallException;
use Closure;
use Illuminate\Database\Connection;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Grammars\Grammar;
use Illuminate\Database\SQLiteConnection;
use Illuminate\Support\Fluent;
use Illuminate\Support\Traits\Macroable;
class Blueprint
{
    use Macroable;
    protected $table;
    protected $prefix;
    protected $columns = [];
    protected $commands = [];
    public $engine;
    public $charset;
    public $collation;
    public $temporary = false;
    public $after;
    public function __construct($table, Closure $callback = null, $prefix = '')
    {
        $this->table = $table;
        $this->prefix = $prefix;
        if (!is_null($callback)) {
            $callback($this);
        }
    }
    public function build(Connection $connection, Grammar $grammar)
    {
        foreach ($this->toSql($connection, $grammar) as $statement) {
            $connection->statement($statement);
        }
    }
    public function toSql(Connection $connection, Grammar $grammar)
    {
        $this->addImpliedCommands($grammar);
        $statements = [];
        $this->ensureCommandsAreValid($connection);
        foreach ($this->commands as $command) {
            $method = 'compile' . ucfirst($command->name);
            if (method_exists($grammar, $method) || $grammar::hasMacro($method)) {
                if (!is_null($sql = $grammar->{$method}($this, $command, $connection))) {
                    $statements = array_merge($statements, (array) $sql);
                }
            }
        }
        return $statements;
    }
    protected function ensureCommandsAreValid(Connection $connection)
    {
        if ($connection instanceof SQLiteConnection) {
            if ($this->commandsNamed(['dropColumn', 'renameColumn'])->count() > 1) {
                throw new BadMethodCallException("SQLite doesn't support multiple calls to dropColumn / renameColumn in a single modification.");
            }
            if ($this->commandsNamed(['dropForeign'])->count() > 0) {
                throw new BadMethodCallException("SQLite doesn't support dropping foreign keys (you would need to re-create the table).");
            }
        }
    }
    protected function commandsNamed(array $names)
    {
        return collect($this->commands)->filter(function ($command) use($names) {
            return in_array($command->name, $names);
        });
    }
    protected function addImpliedCommands(Grammar $grammar)
    {
        if (count($this->getAddedColumns()) > 0 && !$this->creating()) {
            array_unshift($this->commands, $this->createCommand('add'));
        }
        if (count($this->getChangedColumns()) > 0 && !$this->creating()) {
            array_unshift($this->commands, $this->createCommand('change'));
        }
        $this->addFluentIndexes();
        $this->addFluentCommands($grammar);
    }
    protected function addFluentIndexes()
    {
        foreach ($this->columns as $column) {
            foreach (['primary', 'unique', 'index', 'fulltext', 'fullText', 'spatialIndex'] as $index) {
                if ($column->{$index} === true) {
                    $this->{$index}($column->name);
                    $column->{$index} = false;
                    continue 2;
                } elseif (isset($column->{$index})) {
                    $this->{$index}($column->name, $column->{$index});
                    $column->{$index} = false;
                    continue 2;
                }
            }
        }
    }
    public function addFluentCommands(Grammar $grammar)
    {
        foreach ($this->columns as $column) {
            foreach ($grammar->getFluentCommands() as $commandName) {
                $attributeName = lcfirst($commandName);
                if (!isset($column->{$attributeName})) {
                    continue;
                }
                $value = $column->{$attributeName};
                $this->addCommand($commandName, compact('value', 'column'));
            }
        }
    }
    public function creating()
    {
        return collect($this->commands)->contains(function ($command) {
            return $command->name === 'create';
        });
    }
    public function create()
    {
        return $this->addCommand('create');
    }
    public function temporary()
    {
        $this->temporary = true;
    }
    public function drop()
    {
        return $this->addCommand('drop');
    }
    public function dropIfExists()
    {
        return $this->addCommand('dropIfExists');
    }
    public function dropColumn($columns)
    {
        $columns = is_array($columns) ? $columns : func_get_args();
        return $this->addCommand('dropColumn', compact('columns'));
    }
    public function renameColumn($from, $to)
    {
        return $this->addCommand('renameColumn', compact('from', 'to'));
    }
    public function dropPrimary($index = null)
    {
        return $this->dropIndexCommand('dropPrimary', 'primary', $index);
    }
    public function dropUnique($index)
    {
        return $this->dropIndexCommand('dropUnique', 'unique', $index);
    }
    public function dropIndex($index)
    {
        return $this->dropIndexCommand('dropIndex', 'index', $index);
    }
    public function dropFullText($index)
    {
        return $this->dropIndexCommand('dropFullText', 'fulltext', $index);
    }
    public function dropSpatialIndex($index)
    {
        return $this->dropIndexCommand('dropSpatialIndex', 'spatialIndex', $index);
    }
    public function dropForeign($index)
    {
        return $this->dropIndexCommand('dropForeign', 'foreign', $index);
    }
    public function dropConstrainedForeignId($column)
    {
        $this->dropForeign([$column]);
        return $this->dropColumn($column);
    }
    public function renameIndex($from, $to)
    {
        return $this->addCommand('renameIndex', compact('from', 'to'));
    }
    public function dropTimestamps()
    {
        $this->dropColumn('created_at', 'updated_at');
    }
    public function dropTimestampsTz()
    {
        $this->dropTimestamps();
    }
    public function dropSoftDeletes($column = 'deleted_at')
    {
        $this->dropColumn($column);
    }
    public function dropSoftDeletesTz($column = 'deleted_at')
    {
        $this->dropSoftDeletes($column);
    }
    public function dropRememberToken()
    {
        $this->dropColumn('remember_token');
    }
    public function dropMorphs($name, $indexName = null)
    {
        $this->dropIndex($indexName ?: $this->createIndexName('index', ["{$name}_type", "{$name}_id"]));
        $this->dropColumn("{$name}_type", "{$name}_id");
    }
    public function rename($to)
    {
        return $this->addCommand('rename', compact('to'));
    }
    public function primary($columns, $name = null, $algorithm = null)
    {
        return $this->indexCommand('primary', $columns, $name, $algorithm);
    }
    public function unique($columns, $name = null, $algorithm = null)
    {
        return $this->indexCommand('unique', $columns, $name, $algorithm);
    }
    public function index($columns, $name = null, $algorithm = null)
    {
        return $this->indexCommand('index', $columns, $name, $algorithm);
    }
    public function fullText($columns, $name = null, $algorithm = null)
    {
        return $this->indexCommand('fulltext', $columns, $name, $algorithm);
    }
    public function spatialIndex($columns, $name = null)
    {
        return $this->indexCommand('spatialIndex', $columns, $name);
    }
    public function rawIndex($expression, $name)
    {
        return $this->index([new Expression($expression)], $name);
    }
    public function foreign($columns, $name = null)
    {
        $command = new ForeignKeyDefinition($this->indexCommand('foreign', $columns, $name)->getAttributes());
        $this->commands[count($this->commands) - 1] = $command;
        return $command;
    }
    public function id($column = 'id')
    {
        return $this->bigIncrements($column);
    }
    public function increments($column)
    {
        return $this->unsignedInteger($column, true);
    }
    public function integerIncrements($column)
    {
        return $this->unsignedInteger($column, true);
    }
    public function tinyIncrements($column)
    {
        return $this->unsignedTinyInteger($column, true);
    }
    public function smallIncrements($column)
    {
        return $this->unsignedSmallInteger($column, true);
    }
    public function mediumIncrements($column)
    {
        return $this->unsignedMediumInteger($column, true);
    }
    public function bigIncrements($column)
    {
        return $this->unsignedBigInteger($column, true);
    }
    public function char($column, $length = null)
    {
        $length = $length ?: Builder::$defaultStringLength;
        return $this->addColumn('char', $column, compact('length'));
    }
    public function string($column, $length = null)
    {
        $length = $length ?: Builder::$defaultStringLength;
        return $this->addColumn('string', $column, compact('length'));
    }
    public function tinyText($column)
    {
        return $this->addColumn('tinyText', $column);
    }
    public function text($column)
    {
        return $this->addColumn('text', $column);
    }
    public function mediumText($column)
    {
        return $this->addColumn('mediumText', $column);
    }
    public function longText($column)
    {
        return $this->addColumn('longText', $column);
    }
    public function integer($column, $autoIncrement = false, $unsigned = false)
    {
        return $this->addColumn('integer', $column, compact('autoIncrement', 'unsigned'));
    }
    public function tinyInteger($column, $autoIncrement = false, $unsigned = false)
    {
        return $this->addColumn('tinyInteger', $column, compact('autoIncrement', 'unsigned'));
    }
    public function smallInteger($column, $autoIncrement = false, $unsigned = false)
    {
        return $this->addColumn('smallInteger', $column, compact('autoIncrement', 'unsigned'));
    }
    public function mediumInteger($column, $autoIncrement = false, $unsigned = false)
    {
        return $this->addColumn('mediumInteger', $column, compact('autoIncrement', 'unsigned'));
    }
    public function bigInteger($column, $autoIncrement = false, $unsigned = false)
    {
        return $this->addColumn('bigInteger', $column, compact('autoIncrement', 'unsigned'));
    }
    public function unsignedInteger($column, $autoIncrement = false)
    {
        return $this->integer($column, $autoIncrement, true);
    }
    public function unsignedTinyInteger($column, $autoIncrement = false)
    {
        return $this->tinyInteger($column, $autoIncrement, true);
    }
    public function unsignedSmallInteger($column, $autoIncrement = false)
    {
        return $this->smallInteger($column, $autoIncrement, true);
    }
    public function unsignedMediumInteger($column, $autoIncrement = false)
    {
        return $this->mediumInteger($column, $autoIncrement, true);
    }
    public function unsignedBigInteger($column, $autoIncrement = false)
    {
        return $this->bigInteger($column, $autoIncrement, true);
    }
    public function foreignId($column)
    {
        return $this->addColumnDefinition(new ForeignIdColumnDefinition($this, ['type' => 'bigInteger', 'name' => $column, 'autoIncrement' => false, 'unsigned' => true]));
    }
    public function foreignIdFor($model, $column = null)
    {
        if (is_string($model)) {
            $model = new $model();
        }
        return $model->getKeyType() === 'int' && $model->getIncrementing() ? $this->foreignId($column ?: $model->getForeignKey()) : $this->foreignUuid($column ?: $model->getForeignKey());
    }
    public function float($column, $total = 8, $places = 2, $unsigned = false)
    {
        return $this->addColumn('float', $column, compact('total', 'places', 'unsigned'));
    }
    public function double($column, $total = null, $places = null, $unsigned = false)
    {
        return $this->addColumn('double', $column, compact('total', 'places', 'unsigned'));
    }
    public function decimal($column, $total = 8, $places = 2, $unsigned = false)
    {
        return $this->addColumn('decimal', $column, compact('total', 'places', 'unsigned'));
    }
    public function unsignedFloat($column, $total = 8, $places = 2)
    {
        return $this->float($column, $total, $places, true);
    }
    public function unsignedDouble($column, $total = null, $places = null)
    {
        return $this->double($column, $total, $places, true);
    }
    public function unsignedDecimal($column, $total = 8, $places = 2)
    {
        return $this->decimal($column, $total, $places, true);
    }
    public function boolean($column)
    {
        return $this->addColumn('boolean', $column);
    }
    public function enum($column, array $allowed)
    {
        return $this->addColumn('enum', $column, compact('allowed'));
    }
    public function set($column, array $allowed)
    {
        return $this->addColumn('set', $column, compact('allowed'));
    }
    public function json($column)
    {
        return $this->addColumn('json', $column);
    }
    public function jsonb($column)
    {
        return $this->addColumn('jsonb', $column);
    }
    public function date($column)
    {
        return $this->addColumn('date', $column);
    }
    public function dateTime($column, $precision = 0)
    {
        return $this->addColumn('dateTime', $column, compact('precision'));
    }
    public function dateTimeTz($column, $precision = 0)
    {
        return $this->addColumn('dateTimeTz', $column, compact('precision'));
    }
    public function time($column, $precision = 0)
    {
        return $this->addColumn('time', $column, compact('precision'));
    }
    public function timeTz($column, $precision = 0)
    {
        return $this->addColumn('timeTz', $column, compact('precision'));
    }
    public function timestamp($column, $precision = 0)
    {
        return $this->addColumn('timestamp', $column, compact('precision'));
    }
    public function timestampTz($column, $precision = 0)
    {
        return $this->addColumn('timestampTz', $column, compact('precision'));
    }
    public function timestamps($precision = 0)
    {
        $this->timestamp('created_at', $precision)->nullable();
        $this->timestamp('updated_at', $precision)->nullable();
    }
    public function nullableTimestamps($precision = 0)
    {
        $this->timestamps($precision);
    }
    public function timestampsTz($precision = 0)
    {
        $this->timestampTz('created_at', $precision)->nullable();
        $this->timestampTz('updated_at', $precision)->nullable();
    }
    public function softDeletes($column = 'deleted_at', $precision = 0)
    {
        return $this->timestamp($column, $precision)->nullable();
    }
    public function softDeletesTz($column = 'deleted_at', $precision = 0)
    {
        return $this->timestampTz($column, $precision)->nullable();
    }
    public function year($column)
    {
        return $this->addColumn('year', $column);
    }
    public function binary($column)
    {
        return $this->addColumn('binary', $column);
    }
    public function uuid($column)
    {
        return $this->addColumn('uuid', $column);
    }
    public function foreignUuid($column)
    {
        return $this->addColumnDefinition(new ForeignIdColumnDefinition($this, ['type' => 'uuid', 'name' => $column]));
    }
    public function ipAddress($column)
    {
        return $this->addColumn('ipAddress', $column);
    }
    public function macAddress($column)
    {
        return $this->addColumn('macAddress', $column);
    }
    public function geometry($column)
    {
        return $this->addColumn('geometry', $column);
    }
    public function point($column, $srid = null)
    {
        return $this->addColumn('point', $column, compact('srid'));
    }
    public function lineString($column)
    {
        return $this->addColumn('linestring', $column);
    }
    public function polygon($column)
    {
        return $this->addColumn('polygon', $column);
    }
    public function geometryCollection($column)
    {
        return $this->addColumn('geometrycollection', $column);
    }
    public function multiPoint($column)
    {
        return $this->addColumn('multipoint', $column);
    }
    public function multiLineString($column)
    {
        return $this->addColumn('multilinestring', $column);
    }
    public function multiPolygon($column)
    {
        return $this->addColumn('multipolygon', $column);
    }
    public function multiPolygonZ($column)
    {
        return $this->addColumn('multipolygonz', $column);
    }
    public function computed($column, $expression)
    {
        return $this->addColumn('computed', $column, compact('expression'));
    }
    public function morphs($name, $indexName = null)
    {
        if (Builder::$defaultMorphKeyType === 'uuid') {
            $this->uuidMorphs($name, $indexName);
        } else {
            $this->numericMorphs($name, $indexName);
        }
    }
    public function nullableMorphs($name, $indexName = null)
    {
        if (Builder::$defaultMorphKeyType === 'uuid') {
            $this->nullableUuidMorphs($name, $indexName);
        } else {
            $this->nullableNumericMorphs($name, $indexName);
        }
    }
    public function numericMorphs($name, $indexName = null)
    {
        $this->string("{$name}_type");
        $this->unsignedBigInteger("{$name}_id");
        $this->index(["{$name}_type", "{$name}_id"], $indexName);
    }
    public function nullableNumericMorphs($name, $indexName = null)
    {
        $this->string("{$name}_type")->nullable();
        $this->unsignedBigInteger("{$name}_id")->nullable();
        $this->index(["{$name}_type", "{$name}_id"], $indexName);
    }
    public function uuidMorphs($name, $indexName = null)
    {
        $this->string("{$name}_type");
        $this->uuid("{$name}_id");
        $this->index(["{$name}_type", "{$name}_id"], $indexName);
    }
    public function nullableUuidMorphs($name, $indexName = null)
    {
        $this->string("{$name}_type")->nullable();
        $this->uuid("{$name}_id")->nullable();
        $this->index(["{$name}_type", "{$name}_id"], $indexName);
    }
    public function rememberToken()
    {
        return $this->string('remember_token', 100)->nullable();
    }
    protected function indexCommand($type, $columns, $index, $algorithm = null)
    {
        $columns = (array) $columns;
        $index = $index ?: $this->createIndexName($type, $columns);
        return $this->addCommand($type, compact('index', 'columns', 'algorithm'));
    }
    protected function dropIndexCommand($command, $type, $index)
    {
        $columns = [];
        if (is_array($index)) {
            $index = $this->createIndexName($type, $columns = $index);
        }
        return $this->indexCommand($command, $columns, $index);
    }
    protected function createIndexName($type, array $columns)
    {
        $index = strtolower($this->prefix . $this->table . '_' . implode('_', $columns) . '_' . $type);
        return str_replace(['-', '.'], '_', $index);
    }
    public function addColumn($type, $name, array $parameters = [])
    {
        return $this->addColumnDefinition(new ColumnDefinition(array_merge(compact('type', 'name'), $parameters)));
    }
    protected function addColumnDefinition($definition)
    {
        $this->columns[] = $definition;
        if ($this->after) {
            $definition->after($this->after);
            $this->after = $definition->name;
        }
        return $definition;
    }
    public function after($column, Closure $callback)
    {
        $this->after = $column;
        $callback($this);
        $this->after = null;
    }
    public function removeColumn($name)
    {
        $this->columns = array_values(array_filter($this->columns, function ($c) use($name) {
            return $c['name'] != $name;
        }));
        return $this;
    }
    protected function addCommand($name, array $parameters = [])
    {
        $this->commands[] = $command = $this->createCommand($name, $parameters);
        return $command;
    }
    protected function createCommand($name, array $parameters = [])
    {
        return new Fluent(array_merge(compact('name'), $parameters));
    }
    public function getTable()
    {
        return $this->table;
    }
    public function getColumns()
    {
        return $this->columns;
    }
    public function getCommands()
    {
        return $this->commands;
    }
    public function getAddedColumns()
    {
        return array_filter($this->columns, function ($column) {
            return !$column->change;
        });
    }
    public function getChangedColumns()
    {
        return array_filter($this->columns, function ($column) {
            return (bool) $column->change;
        });
    }
    public function hasAutoIncrementColumn()
    {
        return !is_null(collect($this->getAddedColumns())->first(function ($column) {
            return $column->autoIncrement === true;
        }));
    }
    public function autoIncrementingStartingValues()
    {
        if (!$this->hasAutoIncrementColumn()) {
            return [];
        }
        return collect($this->getAddedColumns())->mapWithKeys(function ($column) {
            return $column->autoIncrement === true ? [$column->name => $column->get('startingValue', $column->get('from'))] : [$column->name => null];
        })->filter()->all();
    }
}
}

namespace Illuminate\Database\Schema\Grammars {
use Doctrine\DBAL\Schema\AbstractSchemaManager as SchemaManager;
use Doctrine\DBAL\Schema\TableDiff;
use Illuminate\Database\Connection;
use Illuminate\Database\Grammar as BaseGrammar;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Fluent;
use LogicException;
use RuntimeException;
abstract class Grammar extends BaseGrammar
{
    protected $transactions = false;
    protected $fluentCommands = [];
    public function compileCreateDatabase($name, $connection)
    {
        throw new LogicException('This database driver does not support creating databases.');
    }
    public function compileDropDatabaseIfExists($name)
    {
        throw new LogicException('This database driver does not support dropping databases.');
    }
    public function compileRenameColumn(Blueprint $blueprint, Fluent $command, Connection $connection)
    {
        return RenameColumn::compile($this, $blueprint, $command, $connection);
    }
    public function compileChange(Blueprint $blueprint, Fluent $command, Connection $connection)
    {
        return ChangeColumn::compile($this, $blueprint, $command, $connection);
    }
    public function compileFulltext(Blueprint $blueprint, Fluent $command)
    {
        throw new RuntimeException('This database driver does not support fulltext index creation.');
    }
    public function compileDropFullText(Blueprint $blueprint, Fluent $command)
    {
        throw new RuntimeException('This database driver does not support fulltext index creation.');
    }
    public function compileForeign(Blueprint $blueprint, Fluent $command)
    {
        $sql = sprintf('alter table %s add constraint %s ', $this->wrapTable($blueprint), $this->wrap($command->index));
        $sql .= sprintf('foreign key (%s) references %s (%s)', $this->columnize($command->columns), $this->wrapTable($command->on), $this->columnize((array) $command->references));
        if (!is_null($command->onDelete)) {
            $sql .= " on delete {$command->onDelete}";
        }
        if (!is_null($command->onUpdate)) {
            $sql .= " on update {$command->onUpdate}";
        }
        return $sql;
    }
    protected function getColumns(Blueprint $blueprint)
    {
        $columns = [];
        foreach ($blueprint->getAddedColumns() as $column) {
            $sql = $this->wrap($column) . ' ' . $this->getType($column);
            $columns[] = $this->addModifiers($sql, $blueprint, $column);
        }
        return $columns;
    }
    protected function getType(Fluent $column)
    {
        return $this->{'type' . ucfirst($column->type)}($column);
    }
    protected function typeComputed(Fluent $column)
    {
        throw new RuntimeException('This database driver does not support the computed type.');
    }
    protected function addModifiers($sql, Blueprint $blueprint, Fluent $column)
    {
        foreach ($this->modifiers as $modifier) {
            if (method_exists($this, $method = "modify{$modifier}")) {
                $sql .= $this->{$method}($blueprint, $column);
            }
        }
        return $sql;
    }
    protected function getCommandByName(Blueprint $blueprint, $name)
    {
        $commands = $this->getCommandsByName($blueprint, $name);
        if (count($commands) > 0) {
            return reset($commands);
        }
    }
    protected function getCommandsByName(Blueprint $blueprint, $name)
    {
        return array_filter($blueprint->getCommands(), function ($value) use($name) {
            return $value->name == $name;
        });
    }
    public function prefixArray($prefix, array $values)
    {
        return array_map(function ($value) use($prefix) {
            return $prefix . ' ' . $value;
        }, $values);
    }
    public function wrapTable($table)
    {
        return parent::wrapTable($table instanceof Blueprint ? $table->getTable() : $table);
    }
    public function wrap($value, $prefixAlias = false)
    {
        return parent::wrap($value instanceof Fluent ? $value->name : $value, $prefixAlias);
    }
    protected function getDefaultValue($value)
    {
        if ($value instanceof Expression) {
            return $value;
        }
        return is_bool($value) ? "'" . (int) $value . "'" : "'" . (string) $value . "'";
    }
    public function getDoctrineTableDiff(Blueprint $blueprint, SchemaManager $schema)
    {
        $table = $this->getTablePrefix() . $blueprint->getTable();
        return tap(new TableDiff($table), function ($tableDiff) use($schema, $table) {
            $tableDiff->fromTable = $schema->listTableDetails($table);
        });
    }
    public function getFluentCommands()
    {
        return $this->fluentCommands;
    }
    public function supportsSchemaTransactions()
    {
        return $this->transactions;
    }
}
}

namespace Illuminate\Database\Schema\Grammars {
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Fluent;
class SqlServerGrammar extends Grammar
{
    protected $transactions = true;
    protected $modifiers = ['Increment', 'Collate', 'Nullable', 'Default', 'Persisted'];
    protected $serials = ['tinyInteger', 'smallInteger', 'mediumInteger', 'integer', 'bigInteger'];
    public function compileCreateDatabase($name, $connection)
    {
        return sprintf('create database %s', $this->wrapValue($name));
    }
    public function compileDropDatabaseIfExists($name)
    {
        return sprintf('drop database if exists %s', $this->wrapValue($name));
    }
    public function compileTableExists()
    {
        return "select * from sys.sysobjects where id = object_id(?) and xtype in ('U', 'V')";
    }
    public function compileColumnListing($table)
    {
        return "select name from sys.columns where object_id = object_id('{$table}')";
    }
    public function compileCreate(Blueprint $blueprint, Fluent $command)
    {
        $columns = implode(', ', $this->getColumns($blueprint));
        return 'create table ' . $this->wrapTable($blueprint) . " ({$columns})";
    }
    public function compileAdd(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('alter table %s add %s', $this->wrapTable($blueprint), implode(', ', $this->getColumns($blueprint)));
    }
    public function compilePrimary(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('alter table %s add constraint %s primary key (%s)', $this->wrapTable($blueprint), $this->wrap($command->index), $this->columnize($command->columns));
    }
    public function compileUnique(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('create unique index %s on %s (%s)', $this->wrap($command->index), $this->wrapTable($blueprint), $this->columnize($command->columns));
    }
    public function compileIndex(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('create index %s on %s (%s)', $this->wrap($command->index), $this->wrapTable($blueprint), $this->columnize($command->columns));
    }
    public function compileSpatialIndex(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('create spatial index %s on %s (%s)', $this->wrap($command->index), $this->wrapTable($blueprint), $this->columnize($command->columns));
    }
    public function compileDrop(Blueprint $blueprint, Fluent $command)
    {
        return 'drop table ' . $this->wrapTable($blueprint);
    }
    public function compileDropIfExists(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('if exists (select * from sys.sysobjects where id = object_id(%s, \'U\')) drop table %s', "'" . str_replace("'", "''", $this->getTablePrefix() . $blueprint->getTable()) . "'", $this->wrapTable($blueprint));
    }
    public function compileDropAllTables()
    {
        return "EXEC sp_msforeachtable 'DROP TABLE ?'";
    }
    public function compileDropColumn(Blueprint $blueprint, Fluent $command)
    {
        $columns = $this->wrapArray($command->columns);
        $dropExistingConstraintsSql = $this->compileDropDefaultConstraint($blueprint, $command) . ';';
        return $dropExistingConstraintsSql . 'alter table ' . $this->wrapTable($blueprint) . ' drop column ' . implode(', ', $columns);
    }
    public function compileDropDefaultConstraint(Blueprint $blueprint, Fluent $command)
    {
        $columns = "'" . implode("','", $command->columns) . "'";
        $tableName = $this->getTablePrefix() . $blueprint->getTable();
        $sql = "DECLARE @sql NVARCHAR(MAX) = '';";
        $sql .= "SELECT @sql += 'ALTER TABLE [dbo].[{$tableName}] DROP CONSTRAINT ' + OBJECT_NAME([default_object_id]) + ';' ";
        $sql .= 'FROM sys.columns ';
        $sql .= "WHERE [object_id] = OBJECT_ID('[dbo].[{$tableName}]') AND [name] in ({$columns}) AND [default_object_id] <> 0;";
        $sql .= 'EXEC(@sql)';
        return $sql;
    }
    public function compileDropPrimary(Blueprint $blueprint, Fluent $command)
    {
        $index = $this->wrap($command->index);
        return "alter table {$this->wrapTable($blueprint)} drop constraint {$index}";
    }
    public function compileDropUnique(Blueprint $blueprint, Fluent $command)
    {
        $index = $this->wrap($command->index);
        return "drop index {$index} on {$this->wrapTable($blueprint)}";
    }
    public function compileDropIndex(Blueprint $blueprint, Fluent $command)
    {
        $index = $this->wrap($command->index);
        return "drop index {$index} on {$this->wrapTable($blueprint)}";
    }
    public function compileDropSpatialIndex(Blueprint $blueprint, Fluent $command)
    {
        return $this->compileDropIndex($blueprint, $command);
    }
    public function compileDropForeign(Blueprint $blueprint, Fluent $command)
    {
        $index = $this->wrap($command->index);
        return "alter table {$this->wrapTable($blueprint)} drop constraint {$index}";
    }
    public function compileRename(Blueprint $blueprint, Fluent $command)
    {
        $from = $this->wrapTable($blueprint);
        return "sp_rename {$from}, " . $this->wrapTable($command->to);
    }
    public function compileRenameIndex(Blueprint $blueprint, Fluent $command)
    {
        return sprintf("sp_rename N'%s', %s, N'INDEX'", $this->wrap($blueprint->getTable() . '.' . $command->from), $this->wrap($command->to));
    }
    public function compileEnableForeignKeyConstraints()
    {
        return 'EXEC sp_msforeachtable @command1="print \'?\'", @command2="ALTER TABLE ? WITH CHECK CHECK CONSTRAINT all";';
    }
    public function compileDisableForeignKeyConstraints()
    {
        return 'EXEC sp_msforeachtable "ALTER TABLE ? NOCHECK CONSTRAINT all";';
    }
    public function compileDropAllForeignKeys()
    {
        return "DECLARE @sql NVARCHAR(MAX) = N'';\n            SELECT @sql += 'ALTER TABLE '\n                + QUOTENAME(OBJECT_SCHEMA_NAME(parent_object_id)) + '.' + + QUOTENAME(OBJECT_NAME(parent_object_id))\n                + ' DROP CONSTRAINT ' + QUOTENAME(name) + ';'\n            FROM sys.foreign_keys;\n\n            EXEC sp_executesql @sql;";
    }
    public function compileDropAllViews()
    {
        return "DECLARE @sql NVARCHAR(MAX) = N'';\n            SELECT @sql += 'DROP VIEW ' + QUOTENAME(OBJECT_SCHEMA_NAME(object_id)) + '.' + QUOTENAME(name) + ';'\n            FROM sys.views;\n\n            EXEC sp_executesql @sql;";
    }
    protected function typeChar(Fluent $column)
    {
        return "nchar({$column->length})";
    }
    protected function typeString(Fluent $column)
    {
        return "nvarchar({$column->length})";
    }
    protected function typeTinyText(Fluent $column)
    {
        return 'nvarchar(255)';
    }
    protected function typeText(Fluent $column)
    {
        return 'nvarchar(max)';
    }
    protected function typeMediumText(Fluent $column)
    {
        return 'nvarchar(max)';
    }
    protected function typeLongText(Fluent $column)
    {
        return 'nvarchar(max)';
    }
    protected function typeInteger(Fluent $column)
    {
        return 'int';
    }
    protected function typeBigInteger(Fluent $column)
    {
        return 'bigint';
    }
    protected function typeMediumInteger(Fluent $column)
    {
        return 'int';
    }
    protected function typeTinyInteger(Fluent $column)
    {
        return 'tinyint';
    }
    protected function typeSmallInteger(Fluent $column)
    {
        return 'smallint';
    }
    protected function typeFloat(Fluent $column)
    {
        return 'float';
    }
    protected function typeDouble(Fluent $column)
    {
        return 'float';
    }
    protected function typeDecimal(Fluent $column)
    {
        return "decimal({$column->total}, {$column->places})";
    }
    protected function typeBoolean(Fluent $column)
    {
        return 'bit';
    }
    protected function typeEnum(Fluent $column)
    {
        return sprintf('nvarchar(255) check ("%s" in (%s))', $column->name, $this->quoteString($column->allowed));
    }
    protected function typeJson(Fluent $column)
    {
        return 'nvarchar(max)';
    }
    protected function typeJsonb(Fluent $column)
    {
        return 'nvarchar(max)';
    }
    protected function typeDate(Fluent $column)
    {
        return 'date';
    }
    protected function typeDateTime(Fluent $column)
    {
        return $this->typeTimestamp($column);
    }
    protected function typeDateTimeTz(Fluent $column)
    {
        return $this->typeTimestampTz($column);
    }
    protected function typeTime(Fluent $column)
    {
        return $column->precision ? "time({$column->precision})" : 'time';
    }
    protected function typeTimeTz(Fluent $column)
    {
        return $this->typeTime($column);
    }
    protected function typeTimestamp(Fluent $column)
    {
        $columnType = $column->precision ? "datetime2({$column->precision})" : 'datetime';
        return $column->useCurrent ? "{$columnType} default CURRENT_TIMESTAMP" : $columnType;
    }
    protected function typeTimestampTz(Fluent $column)
    {
        $columnType = $column->precision ? "datetimeoffset({$column->precision})" : 'datetimeoffset';
        return $column->useCurrent ? "{$columnType} default CURRENT_TIMESTAMP" : $columnType;
    }
    protected function typeYear(Fluent $column)
    {
        return $this->typeInteger($column);
    }
    protected function typeBinary(Fluent $column)
    {
        return 'varbinary(max)';
    }
    protected function typeUuid(Fluent $column)
    {
        return 'uniqueidentifier';
    }
    protected function typeIpAddress(Fluent $column)
    {
        return 'nvarchar(45)';
    }
    protected function typeMacAddress(Fluent $column)
    {
        return 'nvarchar(17)';
    }
    public function typeGeometry(Fluent $column)
    {
        return 'geography';
    }
    public function typePoint(Fluent $column)
    {
        return 'geography';
    }
    public function typeLineString(Fluent $column)
    {
        return 'geography';
    }
    public function typePolygon(Fluent $column)
    {
        return 'geography';
    }
    public function typeGeometryCollection(Fluent $column)
    {
        return 'geography';
    }
    public function typeMultiPoint(Fluent $column)
    {
        return 'geography';
    }
    public function typeMultiLineString(Fluent $column)
    {
        return 'geography';
    }
    public function typeMultiPolygon(Fluent $column)
    {
        return 'geography';
    }
    protected function typeComputed(Fluent $column)
    {
        return "as ({$column->expression})";
    }
    protected function modifyCollate(Blueprint $blueprint, Fluent $column)
    {
        if (!is_null($column->collation)) {
            return ' collate ' . $column->collation;
        }
    }
    protected function modifyNullable(Blueprint $blueprint, Fluent $column)
    {
        if ($column->type !== 'computed') {
            return $column->nullable ? ' null' : ' not null';
        }
    }
    protected function modifyDefault(Blueprint $blueprint, Fluent $column)
    {
        if (!is_null($column->default)) {
            return ' default ' . $this->getDefaultValue($column->default);
        }
    }
    protected function modifyIncrement(Blueprint $blueprint, Fluent $column)
    {
        if (in_array($column->type, $this->serials) && $column->autoIncrement) {
            return ' identity primary key';
        }
    }
    protected function modifyPersisted(Blueprint $blueprint, Fluent $column)
    {
        if ($column->persisted) {
            return ' persisted';
        }
    }
    public function wrapTable($table)
    {
        if ($table instanceof Blueprint && $table->temporary) {
            $this->setTablePrefix('#');
        }
        return parent::wrapTable($table);
    }
    public function quoteString($value)
    {
        if (is_array($value)) {
            return implode(', ', array_map([$this, __FUNCTION__], $value));
        }
        return "N'{$value}'";
    }
}
}

namespace Illuminate\Database\Schema\Grammars {
use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Fluent;
use RuntimeException;
class MySqlGrammar extends Grammar
{
    protected $modifiers = ['Unsigned', 'Charset', 'Collate', 'VirtualAs', 'StoredAs', 'Nullable', 'Invisible', 'Srid', 'Default', 'Increment', 'Comment', 'After', 'First'];
    protected $serials = ['bigInteger', 'integer', 'mediumInteger', 'smallInteger', 'tinyInteger'];
    public function compileCreateDatabase($name, $connection)
    {
        return sprintf('create database %s default character set %s default collate %s', $this->wrapValue($name), $this->wrapValue($connection->getConfig('charset')), $this->wrapValue($connection->getConfig('collation')));
    }
    public function compileDropDatabaseIfExists($name)
    {
        return sprintf('drop database if exists %s', $this->wrapValue($name));
    }
    public function compileTableExists()
    {
        return "select * from information_schema.tables where table_schema = ? and table_name = ? and table_type = 'BASE TABLE'";
    }
    public function compileColumnListing()
    {
        return 'select column_name as `column_name` from information_schema.columns where table_schema = ? and table_name = ?';
    }
    public function compileCreate(Blueprint $blueprint, Fluent $command, Connection $connection)
    {
        $sql = $this->compileCreateTable($blueprint, $command, $connection);
        $sql = $this->compileCreateEncoding($sql, $connection, $blueprint);
        return array_values(array_filter(array_merge([$this->compileCreateEngine($sql, $connection, $blueprint)], $this->compileAutoIncrementStartingValues($blueprint))));
    }
    protected function compileCreateTable($blueprint, $command, $connection)
    {
        return trim(sprintf('%s table %s (%s)', $blueprint->temporary ? 'create temporary' : 'create', $this->wrapTable($blueprint), implode(', ', $this->getColumns($blueprint))));
    }
    protected function compileCreateEncoding($sql, Connection $connection, Blueprint $blueprint)
    {
        if (isset($blueprint->charset)) {
            $sql .= ' default character set ' . $blueprint->charset;
        } elseif (!is_null($charset = $connection->getConfig('charset'))) {
            $sql .= ' default character set ' . $charset;
        }
        if (isset($blueprint->collation)) {
            $sql .= " collate '{$blueprint->collation}'";
        } elseif (!is_null($collation = $connection->getConfig('collation'))) {
            $sql .= " collate '{$collation}'";
        }
        return $sql;
    }
    protected function compileCreateEngine($sql, Connection $connection, Blueprint $blueprint)
    {
        if (isset($blueprint->engine)) {
            return $sql . ' engine = ' . $blueprint->engine;
        } elseif (!is_null($engine = $connection->getConfig('engine'))) {
            return $sql . ' engine = ' . $engine;
        }
        return $sql;
    }
    public function compileAdd(Blueprint $blueprint, Fluent $command)
    {
        $columns = $this->prefixArray('add', $this->getColumns($blueprint));
        return array_values(array_merge(['alter table ' . $this->wrapTable($blueprint) . ' ' . implode(', ', $columns)], $this->compileAutoIncrementStartingValues($blueprint)));
    }
    public function compileAutoIncrementStartingValues(Blueprint $blueprint)
    {
        return collect($blueprint->autoIncrementingStartingValues())->map(function ($value, $column) use($blueprint) {
            return 'alter table ' . $this->wrapTable($blueprint->getTable()) . ' auto_increment = ' . $value;
        })->all();
    }
    public function compilePrimary(Blueprint $blueprint, Fluent $command)
    {
        $command->name(null);
        return $this->compileKey($blueprint, $command, 'primary key');
    }
    public function compileUnique(Blueprint $blueprint, Fluent $command)
    {
        return $this->compileKey($blueprint, $command, 'unique');
    }
    public function compileIndex(Blueprint $blueprint, Fluent $command)
    {
        return $this->compileKey($blueprint, $command, 'index');
    }
    public function compileFullText(Blueprint $blueprint, Fluent $command)
    {
        return $this->compileKey($blueprint, $command, 'fulltext');
    }
    public function compileSpatialIndex(Blueprint $blueprint, Fluent $command)
    {
        return $this->compileKey($blueprint, $command, 'spatial index');
    }
    protected function compileKey(Blueprint $blueprint, Fluent $command, $type)
    {
        return sprintf('alter table %s add %s %s%s(%s)', $this->wrapTable($blueprint), $type, $this->wrap($command->index), $command->algorithm ? ' using ' . $command->algorithm : '', $this->columnize($command->columns));
    }
    public function compileDrop(Blueprint $blueprint, Fluent $command)
    {
        return 'drop table ' . $this->wrapTable($blueprint);
    }
    public function compileDropIfExists(Blueprint $blueprint, Fluent $command)
    {
        return 'drop table if exists ' . $this->wrapTable($blueprint);
    }
    public function compileDropColumn(Blueprint $blueprint, Fluent $command)
    {
        $columns = $this->prefixArray('drop', $this->wrapArray($command->columns));
        return 'alter table ' . $this->wrapTable($blueprint) . ' ' . implode(', ', $columns);
    }
    public function compileDropPrimary(Blueprint $blueprint, Fluent $command)
    {
        return 'alter table ' . $this->wrapTable($blueprint) . ' drop primary key';
    }
    public function compileDropUnique(Blueprint $blueprint, Fluent $command)
    {
        $index = $this->wrap($command->index);
        return "alter table {$this->wrapTable($blueprint)} drop index {$index}";
    }
    public function compileDropIndex(Blueprint $blueprint, Fluent $command)
    {
        $index = $this->wrap($command->index);
        return "alter table {$this->wrapTable($blueprint)} drop index {$index}";
    }
    public function compileDropFullText(Blueprint $blueprint, Fluent $command)
    {
        return $this->compileDropIndex($blueprint, $command);
    }
    public function compileDropSpatialIndex(Blueprint $blueprint, Fluent $command)
    {
        return $this->compileDropIndex($blueprint, $command);
    }
    public function compileDropForeign(Blueprint $blueprint, Fluent $command)
    {
        $index = $this->wrap($command->index);
        return "alter table {$this->wrapTable($blueprint)} drop foreign key {$index}";
    }
    public function compileRename(Blueprint $blueprint, Fluent $command)
    {
        $from = $this->wrapTable($blueprint);
        return "rename table {$from} to " . $this->wrapTable($command->to);
    }
    public function compileRenameIndex(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('alter table %s rename index %s to %s', $this->wrapTable($blueprint), $this->wrap($command->from), $this->wrap($command->to));
    }
    public function compileDropAllTables($tables)
    {
        return 'drop table ' . implode(',', $this->wrapArray($tables));
    }
    public function compileDropAllViews($views)
    {
        return 'drop view ' . implode(',', $this->wrapArray($views));
    }
    public function compileGetAllTables()
    {
        return 'SHOW FULL TABLES WHERE table_type = \'BASE TABLE\'';
    }
    public function compileGetAllViews()
    {
        return 'SHOW FULL TABLES WHERE table_type = \'VIEW\'';
    }
    public function compileEnableForeignKeyConstraints()
    {
        return 'SET FOREIGN_KEY_CHECKS=1;';
    }
    public function compileDisableForeignKeyConstraints()
    {
        return 'SET FOREIGN_KEY_CHECKS=0;';
    }
    protected function typeChar(Fluent $column)
    {
        return "char({$column->length})";
    }
    protected function typeString(Fluent $column)
    {
        return "varchar({$column->length})";
    }
    protected function typeTinyText(Fluent $column)
    {
        return 'tinytext';
    }
    protected function typeText(Fluent $column)
    {
        return 'text';
    }
    protected function typeMediumText(Fluent $column)
    {
        return 'mediumtext';
    }
    protected function typeLongText(Fluent $column)
    {
        return 'longtext';
    }
    protected function typeBigInteger(Fluent $column)
    {
        return 'bigint';
    }
    protected function typeInteger(Fluent $column)
    {
        return 'int';
    }
    protected function typeMediumInteger(Fluent $column)
    {
        return 'mediumint';
    }
    protected function typeTinyInteger(Fluent $column)
    {
        return 'tinyint';
    }
    protected function typeSmallInteger(Fluent $column)
    {
        return 'smallint';
    }
    protected function typeFloat(Fluent $column)
    {
        return $this->typeDouble($column);
    }
    protected function typeDouble(Fluent $column)
    {
        if ($column->total && $column->places) {
            return "double({$column->total}, {$column->places})";
        }
        return 'double';
    }
    protected function typeDecimal(Fluent $column)
    {
        return "decimal({$column->total}, {$column->places})";
    }
    protected function typeBoolean(Fluent $column)
    {
        return 'tinyint(1)';
    }
    protected function typeEnum(Fluent $column)
    {
        return sprintf('enum(%s)', $this->quoteString($column->allowed));
    }
    protected function typeSet(Fluent $column)
    {
        return sprintf('set(%s)', $this->quoteString($column->allowed));
    }
    protected function typeJson(Fluent $column)
    {
        return 'json';
    }
    protected function typeJsonb(Fluent $column)
    {
        return 'json';
    }
    protected function typeDate(Fluent $column)
    {
        return 'date';
    }
    protected function typeDateTime(Fluent $column)
    {
        $columnType = $column->precision ? "datetime({$column->precision})" : 'datetime';
        $current = $column->precision ? "CURRENT_TIMESTAMP({$column->precision})" : 'CURRENT_TIMESTAMP';
        $columnType = $column->useCurrent ? "{$columnType} default {$current}" : $columnType;
        return $column->useCurrentOnUpdate ? "{$columnType} on update {$current}" : $columnType;
    }
    protected function typeDateTimeTz(Fluent $column)
    {
        return $this->typeDateTime($column);
    }
    protected function typeTime(Fluent $column)
    {
        return $column->precision ? "time({$column->precision})" : 'time';
    }
    protected function typeTimeTz(Fluent $column)
    {
        return $this->typeTime($column);
    }
    protected function typeTimestamp(Fluent $column)
    {
        $columnType = $column->precision ? "timestamp({$column->precision})" : 'timestamp';
        $current = $column->precision ? "CURRENT_TIMESTAMP({$column->precision})" : 'CURRENT_TIMESTAMP';
        $columnType = $column->useCurrent ? "{$columnType} default {$current}" : $columnType;
        return $column->useCurrentOnUpdate ? "{$columnType} on update {$current}" : $columnType;
    }
    protected function typeTimestampTz(Fluent $column)
    {
        return $this->typeTimestamp($column);
    }
    protected function typeYear(Fluent $column)
    {
        return 'year';
    }
    protected function typeBinary(Fluent $column)
    {
        return 'blob';
    }
    protected function typeUuid(Fluent $column)
    {
        return 'char(36)';
    }
    protected function typeIpAddress(Fluent $column)
    {
        return 'varchar(45)';
    }
    protected function typeMacAddress(Fluent $column)
    {
        return 'varchar(17)';
    }
    public function typeGeometry(Fluent $column)
    {
        return 'geometry';
    }
    public function typePoint(Fluent $column)
    {
        return 'point';
    }
    public function typeLineString(Fluent $column)
    {
        return 'linestring';
    }
    public function typePolygon(Fluent $column)
    {
        return 'polygon';
    }
    public function typeGeometryCollection(Fluent $column)
    {
        return 'geometrycollection';
    }
    public function typeMultiPoint(Fluent $column)
    {
        return 'multipoint';
    }
    public function typeMultiLineString(Fluent $column)
    {
        return 'multilinestring';
    }
    public function typeMultiPolygon(Fluent $column)
    {
        return 'multipolygon';
    }
    protected function typeComputed(Fluent $column)
    {
        throw new RuntimeException('This database driver requires a type, see the virtualAs / storedAs modifiers.');
    }
    protected function modifyVirtualAs(Blueprint $blueprint, Fluent $column)
    {
        if (!is_null($column->virtualAs)) {
            return " as ({$column->virtualAs})";
        }
    }
    protected function modifyStoredAs(Blueprint $blueprint, Fluent $column)
    {
        if (!is_null($column->storedAs)) {
            return " as ({$column->storedAs}) stored";
        }
    }
    protected function modifyUnsigned(Blueprint $blueprint, Fluent $column)
    {
        if ($column->unsigned) {
            return ' unsigned';
        }
    }
    protected function modifyCharset(Blueprint $blueprint, Fluent $column)
    {
        if (!is_null($column->charset)) {
            return ' character set ' . $column->charset;
        }
    }
    protected function modifyCollate(Blueprint $blueprint, Fluent $column)
    {
        if (!is_null($column->collation)) {
            return " collate '{$column->collation}'";
        }
    }
    protected function modifyNullable(Blueprint $blueprint, Fluent $column)
    {
        if (is_null($column->virtualAs) && is_null($column->storedAs)) {
            return $column->nullable ? ' null' : ' not null';
        }
        if ($column->nullable === false) {
            return ' not null';
        }
    }
    protected function modifyInvisible(Blueprint $blueprint, Fluent $column)
    {
        if (!is_null($column->invisible)) {
            return ' invisible';
        }
    }
    protected function modifyDefault(Blueprint $blueprint, Fluent $column)
    {
        if (!is_null($column->default)) {
            return ' default ' . $this->getDefaultValue($column->default);
        }
    }
    protected function modifyIncrement(Blueprint $blueprint, Fluent $column)
    {
        if (in_array($column->type, $this->serials) && $column->autoIncrement) {
            return ' auto_increment primary key';
        }
    }
    protected function modifyFirst(Blueprint $blueprint, Fluent $column)
    {
        if (!is_null($column->first)) {
            return ' first';
        }
    }
    protected function modifyAfter(Blueprint $blueprint, Fluent $column)
    {
        if (!is_null($column->after)) {
            return ' after ' . $this->wrap($column->after);
        }
    }
    protected function modifyComment(Blueprint $blueprint, Fluent $column)
    {
        if (!is_null($column->comment)) {
            return " comment '" . addslashes($column->comment) . "'";
        }
    }
    protected function modifySrid(Blueprint $blueprint, Fluent $column)
    {
        if (!is_null($column->srid) && is_int($column->srid) && $column->srid > 0) {
            return ' srid ' . $column->srid;
        }
    }
    protected function wrapValue($value)
    {
        if ($value !== '*') {
            return '`' . str_replace('`', '``', $value) . '`';
        }
        return $value;
    }
}
}

namespace Illuminate\Database\Schema\Grammars {
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Fluent;
class PostgresGrammar extends Grammar
{
    protected $transactions = true;
    protected $modifiers = ['Collate', 'Increment', 'Nullable', 'Default', 'VirtualAs', 'StoredAs'];
    protected $serials = ['bigInteger', 'integer', 'mediumInteger', 'smallInteger', 'tinyInteger'];
    protected $fluentCommands = ['Comment'];
    public function compileCreateDatabase($name, $connection)
    {
        return sprintf('create database %s encoding %s', $this->wrapValue($name), $this->wrapValue($connection->getConfig('charset')));
    }
    public function compileDropDatabaseIfExists($name)
    {
        return sprintf('drop database if exists %s', $this->wrapValue($name));
    }
    public function compileTableExists()
    {
        return "select * from information_schema.tables where table_schema = ? and table_name = ? and table_type = 'BASE TABLE'";
    }
    public function compileColumnListing()
    {
        return 'select column_name from information_schema.columns where table_schema = ? and table_name = ?';
    }
    public function compileCreate(Blueprint $blueprint, Fluent $command)
    {
        return array_values(array_filter(array_merge([sprintf('%s table %s (%s)', $blueprint->temporary ? 'create temporary' : 'create', $this->wrapTable($blueprint), implode(', ', $this->getColumns($blueprint)))], $this->compileAutoIncrementStartingValues($blueprint))));
    }
    public function compileAdd(Blueprint $blueprint, Fluent $command)
    {
        return array_values(array_filter(array_merge([sprintf('alter table %s %s', $this->wrapTable($blueprint), implode(', ', $this->prefixArray('add column', $this->getColumns($blueprint))))], $this->compileAutoIncrementStartingValues($blueprint))));
    }
    public function compileAutoIncrementStartingValues(Blueprint $blueprint)
    {
        return collect($blueprint->autoIncrementingStartingValues())->map(function ($value, $column) use($blueprint) {
            return 'alter sequence ' . $blueprint->getTable() . '_' . $column . '_seq restart with ' . $value;
        })->all();
    }
    public function compilePrimary(Blueprint $blueprint, Fluent $command)
    {
        $columns = $this->columnize($command->columns);
        return 'alter table ' . $this->wrapTable($blueprint) . " add primary key ({$columns})";
    }
    public function compileUnique(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('alter table %s add constraint %s unique (%s)', $this->wrapTable($blueprint), $this->wrap($command->index), $this->columnize($command->columns));
    }
    public function compileIndex(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('create index %s on %s%s (%s)', $this->wrap($command->index), $this->wrapTable($blueprint), $command->algorithm ? ' using ' . $command->algorithm : '', $this->columnize($command->columns));
    }
    public function compileFulltext(Blueprint $blueprint, Fluent $command)
    {
        $language = $command->language ?: 'english';
        $columns = array_map(function ($column) use($language) {
            return "to_tsvector({$this->quoteString($language)}, {$this->wrap($column)})";
        }, $command->columns);
        return sprintf('create index %s on %s using gin ((%s))', $this->wrap($command->index), $this->wrapTable($blueprint), implode(' || ', $columns));
    }
    public function compileSpatialIndex(Blueprint $blueprint, Fluent $command)
    {
        $command->algorithm = 'gist';
        return $this->compileIndex($blueprint, $command);
    }
    public function compileForeign(Blueprint $blueprint, Fluent $command)
    {
        $sql = parent::compileForeign($blueprint, $command);
        if (!is_null($command->deferrable)) {
            $sql .= $command->deferrable ? ' deferrable' : ' not deferrable';
        }
        if ($command->deferrable && !is_null($command->initiallyImmediate)) {
            $sql .= $command->initiallyImmediate ? ' initially immediate' : ' initially deferred';
        }
        if (!is_null($command->notValid)) {
            $sql .= ' not valid';
        }
        return $sql;
    }
    public function compileDrop(Blueprint $blueprint, Fluent $command)
    {
        return 'drop table ' . $this->wrapTable($blueprint);
    }
    public function compileDropIfExists(Blueprint $blueprint, Fluent $command)
    {
        return 'drop table if exists ' . $this->wrapTable($blueprint);
    }
    public function compileDropAllTables($tables)
    {
        return 'drop table "' . implode('","', $tables) . '" cascade';
    }
    public function compileDropAllViews($views)
    {
        return 'drop view "' . implode('","', $views) . '" cascade';
    }
    public function compileDropAllTypes($types)
    {
        return 'drop type "' . implode('","', $types) . '" cascade';
    }
    public function compileGetAllTables($schema)
    {
        return "select tablename from pg_catalog.pg_tables where schemaname in ('" . implode("','", (array) $schema) . "')";
    }
    public function compileGetAllViews($schema)
    {
        return "select viewname from pg_catalog.pg_views where schemaname in ('" . implode("','", (array) $schema) . "')";
    }
    public function compileGetAllTypes()
    {
        return 'select distinct pg_type.typname from pg_type inner join pg_enum on pg_enum.enumtypid = pg_type.oid';
    }
    public function compileDropColumn(Blueprint $blueprint, Fluent $command)
    {
        $columns = $this->prefixArray('drop column', $this->wrapArray($command->columns));
        return 'alter table ' . $this->wrapTable($blueprint) . ' ' . implode(', ', $columns);
    }
    public function compileDropPrimary(Blueprint $blueprint, Fluent $command)
    {
        $index = $this->wrap("{$blueprint->getTable()}_pkey");
        return 'alter table ' . $this->wrapTable($blueprint) . " drop constraint {$index}";
    }
    public function compileDropUnique(Blueprint $blueprint, Fluent $command)
    {
        $index = $this->wrap($command->index);
        return "alter table {$this->wrapTable($blueprint)} drop constraint {$index}";
    }
    public function compileDropIndex(Blueprint $blueprint, Fluent $command)
    {
        return "drop index {$this->wrap($command->index)}";
    }
    public function compileDropFullText(Blueprint $blueprint, Fluent $command)
    {
        return $this->compileDropIndex($blueprint, $command);
    }
    public function compileDropSpatialIndex(Blueprint $blueprint, Fluent $command)
    {
        return $this->compileDropIndex($blueprint, $command);
    }
    public function compileDropForeign(Blueprint $blueprint, Fluent $command)
    {
        $index = $this->wrap($command->index);
        return "alter table {$this->wrapTable($blueprint)} drop constraint {$index}";
    }
    public function compileRename(Blueprint $blueprint, Fluent $command)
    {
        $from = $this->wrapTable($blueprint);
        return "alter table {$from} rename to " . $this->wrapTable($command->to);
    }
    public function compileRenameIndex(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('alter index %s rename to %s', $this->wrap($command->from), $this->wrap($command->to));
    }
    public function compileEnableForeignKeyConstraints()
    {
        return 'SET CONSTRAINTS ALL IMMEDIATE;';
    }
    public function compileDisableForeignKeyConstraints()
    {
        return 'SET CONSTRAINTS ALL DEFERRED;';
    }
    public function compileComment(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('comment on column %s.%s is %s', $this->wrapTable($blueprint), $this->wrap($command->column->name), "'" . str_replace("'", "''", $command->value) . "'");
    }
    protected function typeChar(Fluent $column)
    {
        return "char({$column->length})";
    }
    protected function typeString(Fluent $column)
    {
        return "varchar({$column->length})";
    }
    protected function typeTinyText(Fluent $column)
    {
        return 'varchar(255)';
    }
    protected function typeText(Fluent $column)
    {
        return 'text';
    }
    protected function typeMediumText(Fluent $column)
    {
        return 'text';
    }
    protected function typeLongText(Fluent $column)
    {
        return 'text';
    }
    protected function typeInteger(Fluent $column)
    {
        return $this->generatableColumn('integer', $column);
    }
    protected function typeBigInteger(Fluent $column)
    {
        return $this->generatableColumn('bigint', $column);
    }
    protected function typeMediumInteger(Fluent $column)
    {
        return $this->generatableColumn('integer', $column);
    }
    protected function typeTinyInteger(Fluent $column)
    {
        return $this->generatableColumn('smallint', $column);
    }
    protected function typeSmallInteger(Fluent $column)
    {
        return $this->generatableColumn('smallint', $column);
    }
    protected function generatableColumn($type, Fluent $column)
    {
        if (!$column->autoIncrement && is_null($column->generatedAs)) {
            return $type;
        }
        if ($column->autoIncrement && is_null($column->generatedAs)) {
            return with(['integer' => 'serial', 'bigint' => 'bigserial', 'smallint' => 'smallserial'])[$type];
        }
        $options = '';
        if (!is_bool($column->generatedAs) && !empty($column->generatedAs)) {
            $options = sprintf(' (%s)', $column->generatedAs);
        }
        return sprintf('%s generated %s as identity%s', $type, $column->always ? 'always' : 'by default', $options);
    }
    protected function typeFloat(Fluent $column)
    {
        return $this->typeDouble($column);
    }
    protected function typeDouble(Fluent $column)
    {
        return 'double precision';
    }
    protected function typeReal(Fluent $column)
    {
        return 'real';
    }
    protected function typeDecimal(Fluent $column)
    {
        return "decimal({$column->total}, {$column->places})";
    }
    protected function typeBoolean(Fluent $column)
    {
        return 'boolean';
    }
    protected function typeEnum(Fluent $column)
    {
        return sprintf('varchar(255) check ("%s" in (%s))', $column->name, $this->quoteString($column->allowed));
    }
    protected function typeJson(Fluent $column)
    {
        return 'json';
    }
    protected function typeJsonb(Fluent $column)
    {
        return 'jsonb';
    }
    protected function typeDate(Fluent $column)
    {
        return 'date';
    }
    protected function typeDateTime(Fluent $column)
    {
        return $this->typeTimestamp($column);
    }
    protected function typeDateTimeTz(Fluent $column)
    {
        return $this->typeTimestampTz($column);
    }
    protected function typeTime(Fluent $column)
    {
        return 'time' . (is_null($column->precision) ? '' : "({$column->precision})") . ' without time zone';
    }
    protected function typeTimeTz(Fluent $column)
    {
        return 'time' . (is_null($column->precision) ? '' : "({$column->precision})") . ' with time zone';
    }
    protected function typeTimestamp(Fluent $column)
    {
        $columnType = 'timestamp' . (is_null($column->precision) ? '' : "({$column->precision})") . ' without time zone';
        return $column->useCurrent ? "{$columnType} default CURRENT_TIMESTAMP" : $columnType;
    }
    protected function typeTimestampTz(Fluent $column)
    {
        $columnType = 'timestamp' . (is_null($column->precision) ? '' : "({$column->precision})") . ' with time zone';
        return $column->useCurrent ? "{$columnType} default CURRENT_TIMESTAMP" : $columnType;
    }
    protected function typeYear(Fluent $column)
    {
        return $this->typeInteger($column);
    }
    protected function typeBinary(Fluent $column)
    {
        return 'bytea';
    }
    protected function typeUuid(Fluent $column)
    {
        return 'uuid';
    }
    protected function typeIpAddress(Fluent $column)
    {
        return 'inet';
    }
    protected function typeMacAddress(Fluent $column)
    {
        return 'macaddr';
    }
    protected function typeGeometry(Fluent $column)
    {
        return $this->formatPostGisType('geometry', $column);
    }
    protected function typePoint(Fluent $column)
    {
        return $this->formatPostGisType('point', $column);
    }
    protected function typeLineString(Fluent $column)
    {
        return $this->formatPostGisType('linestring', $column);
    }
    protected function typePolygon(Fluent $column)
    {
        return $this->formatPostGisType('polygon', $column);
    }
    protected function typeGeometryCollection(Fluent $column)
    {
        return $this->formatPostGisType('geometrycollection', $column);
    }
    protected function typeMultiPoint(Fluent $column)
    {
        return $this->formatPostGisType('multipoint', $column);
    }
    public function typeMultiLineString(Fluent $column)
    {
        return $this->formatPostGisType('multilinestring', $column);
    }
    protected function typeMultiPolygon(Fluent $column)
    {
        return $this->formatPostGisType('multipolygon', $column);
    }
    protected function typeMultiPolygonZ(Fluent $column)
    {
        return $this->formatPostGisType('multipolygonz', $column);
    }
    private function formatPostGisType($type, Fluent $column)
    {
        if ($column->isGeometry === null) {
            return sprintf('geography(%s, %s)', $type, $column->projection ?? '4326');
        }
        if ($column->projection !== null) {
            return sprintf('geometry(%s, %s)', $type, $column->projection);
        }
        return "geometry({$type})";
    }
    protected function modifyCollate(Blueprint $blueprint, Fluent $column)
    {
        if (!is_null($column->collation)) {
            return ' collate ' . $this->wrapValue($column->collation);
        }
    }
    protected function modifyNullable(Blueprint $blueprint, Fluent $column)
    {
        return $column->nullable ? ' null' : ' not null';
    }
    protected function modifyDefault(Blueprint $blueprint, Fluent $column)
    {
        if (!is_null($column->default)) {
            return ' default ' . $this->getDefaultValue($column->default);
        }
    }
    protected function modifyIncrement(Blueprint $blueprint, Fluent $column)
    {
        if ((in_array($column->type, $this->serials) || $column->generatedAs !== null) && $column->autoIncrement) {
            return ' primary key';
        }
    }
    protected function modifyVirtualAs(Blueprint $blueprint, Fluent $column)
    {
        if ($column->virtualAs !== null) {
            return " generated always as ({$column->virtualAs})";
        }
    }
    protected function modifyStoredAs(Blueprint $blueprint, Fluent $column)
    {
        if ($column->storedAs !== null) {
            return " generated always as ({$column->storedAs}) stored";
        }
    }
}
}

namespace Illuminate\Database\Schema\Grammars {
use Doctrine\DBAL\Schema\Index;
use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Arr;
use Illuminate\Support\Fluent;
use RuntimeException;
class SQLiteGrammar extends Grammar
{
    protected $modifiers = ['VirtualAs', 'StoredAs', 'Nullable', 'Default', 'Increment'];
    protected $serials = ['bigInteger', 'integer', 'mediumInteger', 'smallInteger', 'tinyInteger'];
    public function compileTableExists()
    {
        return "select * from sqlite_master where type = 'table' and name = ?";
    }
    public function compileColumnListing($table)
    {
        return 'pragma table_info(' . $this->wrap(str_replace('.', '__', $table)) . ')';
    }
    public function compileCreate(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('%s table %s (%s%s%s)', $blueprint->temporary ? 'create temporary' : 'create', $this->wrapTable($blueprint), implode(', ', $this->getColumns($blueprint)), (string) $this->addForeignKeys($blueprint), (string) $this->addPrimaryKeys($blueprint));
    }
    protected function addForeignKeys(Blueprint $blueprint)
    {
        $foreigns = $this->getCommandsByName($blueprint, 'foreign');
        return collect($foreigns)->reduce(function ($sql, $foreign) {
            $sql .= $this->getForeignKey($foreign);
            if (!is_null($foreign->onDelete)) {
                $sql .= " on delete {$foreign->onDelete}";
            }
            if (!is_null($foreign->onUpdate)) {
                $sql .= " on update {$foreign->onUpdate}";
            }
            return $sql;
        }, '');
    }
    protected function getForeignKey($foreign)
    {
        return sprintf(', foreign key(%s) references %s(%s)', $this->columnize($foreign->columns), $this->wrapTable($foreign->on), $this->columnize((array) $foreign->references));
    }
    protected function addPrimaryKeys(Blueprint $blueprint)
    {
        if (!is_null($primary = $this->getCommandByName($blueprint, 'primary'))) {
            return ", primary key ({$this->columnize($primary->columns)})";
        }
    }
    public function compileAdd(Blueprint $blueprint, Fluent $command)
    {
        $columns = $this->prefixArray('add column', $this->getColumns($blueprint));
        return collect($columns)->reject(function ($column) {
            return preg_match('/as \\(.*\\) stored/', $column) > 0;
        })->map(function ($column) use($blueprint) {
            return 'alter table ' . $this->wrapTable($blueprint) . ' ' . $column;
        })->all();
    }
    public function compileUnique(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('create unique index %s on %s (%s)', $this->wrap($command->index), $this->wrapTable($blueprint), $this->columnize($command->columns));
    }
    public function compileIndex(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('create index %s on %s (%s)', $this->wrap($command->index), $this->wrapTable($blueprint), $this->columnize($command->columns));
    }
    public function compileSpatialIndex(Blueprint $blueprint, Fluent $command)
    {
        throw new RuntimeException('The database driver in use does not support spatial indexes.');
    }
    public function compileForeign(Blueprint $blueprint, Fluent $command)
    {
    }
    public function compileDrop(Blueprint $blueprint, Fluent $command)
    {
        return 'drop table ' . $this->wrapTable($blueprint);
    }
    public function compileDropIfExists(Blueprint $blueprint, Fluent $command)
    {
        return 'drop table if exists ' . $this->wrapTable($blueprint);
    }
    public function compileDropAllTables()
    {
        return "delete from sqlite_master where type in ('table', 'index', 'trigger')";
    }
    public function compileDropAllViews()
    {
        return "delete from sqlite_master where type in ('view')";
    }
    public function compileRebuild()
    {
        return 'vacuum';
    }
    public function compileDropColumn(Blueprint $blueprint, Fluent $command, Connection $connection)
    {
        $tableDiff = $this->getDoctrineTableDiff($blueprint, $schema = $connection->getDoctrineSchemaManager());
        foreach ($command->columns as $name) {
            $tableDiff->removedColumns[$name] = $connection->getDoctrineColumn($this->getTablePrefix() . $blueprint->getTable(), $name);
        }
        return (array) $schema->getDatabasePlatform()->getAlterTableSQL($tableDiff);
    }
    public function compileDropUnique(Blueprint $blueprint, Fluent $command)
    {
        $index = $this->wrap($command->index);
        return "drop index {$index}";
    }
    public function compileDropIndex(Blueprint $blueprint, Fluent $command)
    {
        $index = $this->wrap($command->index);
        return "drop index {$index}";
    }
    public function compileDropSpatialIndex(Blueprint $blueprint, Fluent $command)
    {
        throw new RuntimeException('The database driver in use does not support spatial indexes.');
    }
    public function compileRename(Blueprint $blueprint, Fluent $command)
    {
        $from = $this->wrapTable($blueprint);
        return "alter table {$from} rename to " . $this->wrapTable($command->to);
    }
    public function compileRenameIndex(Blueprint $blueprint, Fluent $command, Connection $connection)
    {
        $schemaManager = $connection->getDoctrineSchemaManager();
        $indexes = $schemaManager->listTableIndexes($this->getTablePrefix() . $blueprint->getTable());
        $index = Arr::get($indexes, $command->from);
        if (!$index) {
            throw new RuntimeException("Index [{$command->from}] does not exist.");
        }
        $newIndex = new Index($command->to, $index->getColumns(), $index->isUnique(), $index->isPrimary(), $index->getFlags(), $index->getOptions());
        $platform = $schemaManager->getDatabasePlatform();
        return [$platform->getDropIndexSQL($command->from, $this->getTablePrefix() . $blueprint->getTable()), $platform->getCreateIndexSQL($newIndex, $this->getTablePrefix() . $blueprint->getTable())];
    }
    public function compileEnableForeignKeyConstraints()
    {
        return 'PRAGMA foreign_keys = ON;';
    }
    public function compileDisableForeignKeyConstraints()
    {
        return 'PRAGMA foreign_keys = OFF;';
    }
    public function compileEnableWriteableSchema()
    {
        return 'PRAGMA writable_schema = 1;';
    }
    public function compileDisableWriteableSchema()
    {
        return 'PRAGMA writable_schema = 0;';
    }
    protected function typeChar(Fluent $column)
    {
        return 'varchar';
    }
    protected function typeString(Fluent $column)
    {
        return 'varchar';
    }
    protected function typeTinyText(Fluent $column)
    {
        return 'text';
    }
    protected function typeText(Fluent $column)
    {
        return 'text';
    }
    protected function typeMediumText(Fluent $column)
    {
        return 'text';
    }
    protected function typeLongText(Fluent $column)
    {
        return 'text';
    }
    protected function typeInteger(Fluent $column)
    {
        return 'integer';
    }
    protected function typeBigInteger(Fluent $column)
    {
        return 'integer';
    }
    protected function typeMediumInteger(Fluent $column)
    {
        return 'integer';
    }
    protected function typeTinyInteger(Fluent $column)
    {
        return 'integer';
    }
    protected function typeSmallInteger(Fluent $column)
    {
        return 'integer';
    }
    protected function typeFloat(Fluent $column)
    {
        return 'float';
    }
    protected function typeDouble(Fluent $column)
    {
        return 'float';
    }
    protected function typeDecimal(Fluent $column)
    {
        return 'numeric';
    }
    protected function typeBoolean(Fluent $column)
    {
        return 'tinyint(1)';
    }
    protected function typeEnum(Fluent $column)
    {
        return sprintf('varchar check ("%s" in (%s))', $column->name, $this->quoteString($column->allowed));
    }
    protected function typeJson(Fluent $column)
    {
        return 'text';
    }
    protected function typeJsonb(Fluent $column)
    {
        return 'text';
    }
    protected function typeDate(Fluent $column)
    {
        return 'date';
    }
    protected function typeDateTime(Fluent $column)
    {
        return $this->typeTimestamp($column);
    }
    protected function typeDateTimeTz(Fluent $column)
    {
        return $this->typeDateTime($column);
    }
    protected function typeTime(Fluent $column)
    {
        return 'time';
    }
    protected function typeTimeTz(Fluent $column)
    {
        return $this->typeTime($column);
    }
    protected function typeTimestamp(Fluent $column)
    {
        return $column->useCurrent ? 'datetime default CURRENT_TIMESTAMP' : 'datetime';
    }
    protected function typeTimestampTz(Fluent $column)
    {
        return $this->typeTimestamp($column);
    }
    protected function typeYear(Fluent $column)
    {
        return $this->typeInteger($column);
    }
    protected function typeBinary(Fluent $column)
    {
        return 'blob';
    }
    protected function typeUuid(Fluent $column)
    {
        return 'varchar';
    }
    protected function typeIpAddress(Fluent $column)
    {
        return 'varchar';
    }
    protected function typeMacAddress(Fluent $column)
    {
        return 'varchar';
    }
    public function typeGeometry(Fluent $column)
    {
        return 'geometry';
    }
    public function typePoint(Fluent $column)
    {
        return 'point';
    }
    public function typeLineString(Fluent $column)
    {
        return 'linestring';
    }
    public function typePolygon(Fluent $column)
    {
        return 'polygon';
    }
    public function typeGeometryCollection(Fluent $column)
    {
        return 'geometrycollection';
    }
    public function typeMultiPoint(Fluent $column)
    {
        return 'multipoint';
    }
    public function typeMultiLineString(Fluent $column)
    {
        return 'multilinestring';
    }
    public function typeMultiPolygon(Fluent $column)
    {
        return 'multipolygon';
    }
    protected function typeComputed(Fluent $column)
    {
        throw new RuntimeException('This database driver requires a type, see the virtualAs / storedAs modifiers.');
    }
    protected function modifyVirtualAs(Blueprint $blueprint, Fluent $column)
    {
        if (!is_null($column->virtualAs)) {
            return " as ({$column->virtualAs})";
        }
    }
    protected function modifyStoredAs(Blueprint $blueprint, Fluent $column)
    {
        if (!is_null($column->storedAs)) {
            return " as ({$column->storedAs}) stored";
        }
    }
    protected function modifyNullable(Blueprint $blueprint, Fluent $column)
    {
        if (is_null($column->virtualAs) && is_null($column->storedAs)) {
            return $column->nullable ? '' : ' not null';
        }
        if ($column->nullable === false) {
            return ' not null';
        }
    }
    protected function modifyDefault(Blueprint $blueprint, Fluent $column)
    {
        if (!is_null($column->default) && is_null($column->virtualAs) && is_null($column->storedAs)) {
            return ' default ' . $this->getDefaultValue($column->default);
        }
    }
    protected function modifyIncrement(Blueprint $blueprint, Fluent $column)
    {
        if (in_array($column->type, $this->serials) && $column->autoIncrement) {
            return ' primary key autoincrement';
        }
    }
}
}

namespace Illuminate\Database\Schema {
class MySqlBuilder extends Builder
{
    public function createDatabase($name)
    {
        return $this->connection->statement($this->grammar->compileCreateDatabase($name, $this->connection));
    }
    public function dropDatabaseIfExists($name)
    {
        return $this->connection->statement($this->grammar->compileDropDatabaseIfExists($name));
    }
    public function hasTable($table)
    {
        $table = $this->connection->getTablePrefix() . $table;
        return count($this->connection->select($this->grammar->compileTableExists(), [$this->connection->getDatabaseName(), $table])) > 0;
    }
    public function getColumnListing($table)
    {
        $table = $this->connection->getTablePrefix() . $table;
        $results = $this->connection->select($this->grammar->compileColumnListing(), [$this->connection->getDatabaseName(), $table]);
        return $this->connection->getPostProcessor()->processColumnListing($results);
    }
    public function dropAllTables()
    {
        $tables = [];
        foreach ($this->getAllTables() as $row) {
            $row = (array) $row;
            $tables[] = reset($row);
        }
        if (empty($tables)) {
            return;
        }
        $this->disableForeignKeyConstraints();
        $this->connection->statement($this->grammar->compileDropAllTables($tables));
        $this->enableForeignKeyConstraints();
    }
    public function dropAllViews()
    {
        $views = [];
        foreach ($this->getAllViews() as $row) {
            $row = (array) $row;
            $views[] = reset($row);
        }
        if (empty($views)) {
            return;
        }
        $this->connection->statement($this->grammar->compileDropAllViews($views));
    }
    public function getAllTables()
    {
        return $this->connection->select($this->grammar->compileGetAllTables());
    }
    public function getAllViews()
    {
        return $this->connection->select($this->grammar->compileGetAllViews());
    }
}
}

namespace Illuminate\Database\Schema {
class PostgresBuilder extends Builder
{
    public function createDatabase($name)
    {
        return $this->connection->statement($this->grammar->compileCreateDatabase($name, $this->connection));
    }
    public function dropDatabaseIfExists($name)
    {
        return $this->connection->statement($this->grammar->compileDropDatabaseIfExists($name));
    }
    public function hasTable($table)
    {
        [$schema, $table] = $this->parseSchemaAndTable($table);
        $table = $this->connection->getTablePrefix() . $table;
        return count($this->connection->select($this->grammar->compileTableExists(), [$schema, $table])) > 0;
    }
    public function dropAllTables()
    {
        $tables = [];
        $excludedTables = $this->connection->getConfig('dont_drop') ?? ['spatial_ref_sys'];
        foreach ($this->getAllTables() as $row) {
            $row = (array) $row;
            $table = reset($row);
            if (!in_array($table, $excludedTables)) {
                $tables[] = $table;
            }
        }
        if (empty($tables)) {
            return;
        }
        $this->connection->statement($this->grammar->compileDropAllTables($tables));
    }
    public function dropAllViews()
    {
        $views = [];
        foreach ($this->getAllViews() as $row) {
            $row = (array) $row;
            $views[] = reset($row);
        }
        if (empty($views)) {
            return;
        }
        $this->connection->statement($this->grammar->compileDropAllViews($views));
    }
    public function dropAllTypes()
    {
        $types = [];
        foreach ($this->getAllTypes() as $row) {
            $row = (array) $row;
            $types[] = reset($row);
        }
        if (empty($types)) {
            return;
        }
        $this->connection->statement($this->grammar->compileDropAllTypes($types));
    }
    public function getAllTables()
    {
        return $this->connection->select($this->grammar->compileGetAllTables((array) $this->connection->getConfig('schema')));
    }
    public function getAllViews()
    {
        return $this->connection->select($this->grammar->compileGetAllViews((array) $this->connection->getConfig('schema')));
    }
    public function getAllTypes()
    {
        return $this->connection->select($this->grammar->compileGetAllTypes());
    }
    public function getColumnListing($table)
    {
        [$schema, $table] = $this->parseSchemaAndTable($table);
        $table = $this->connection->getTablePrefix() . $table;
        $results = $this->connection->select($this->grammar->compileColumnListing(), [$schema, $table]);
        return $this->connection->getPostProcessor()->processColumnListing($results);
    }
    protected function parseSchemaAndTable($table)
    {
        $table = explode('.', $table);
        if (is_array($schema = $this->connection->getConfig('schema'))) {
            if (in_array($table[0], $schema)) {
                return [array_shift($table), implode('.', $table)];
            }
            $schema = head($schema);
        }
        return [$schema ?: 'public', implode('.', $table)];
    }
}
}

namespace Illuminate\Database {
interface ConnectionResolverInterface
{
    public function connection($name = null);
    public function getDefaultConnection();
    public function setDefaultConnection($name);
}
}

namespace Illuminate\Database\Capsule {
use Illuminate\Container\Container;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Traits\CapsuleManagerTrait;
use PDO;
class Manager
{
    use CapsuleManagerTrait;
    protected $manager;
    public function __construct(Container $container = null)
    {
        $this->setupContainer($container ?: new Container());
        $this->setupDefaultConfiguration();
        $this->setupManager();
    }
    protected function setupDefaultConfiguration()
    {
        $this->container['config']['database.fetch'] = PDO::FETCH_OBJ;
        $this->container['config']['database.default'] = 'default';
    }
    protected function setupManager()
    {
        $factory = new ConnectionFactory($this->container);
        $this->manager = new DatabaseManager($this->container, $factory);
    }
    public static function connection($connection = null)
    {
        return static::$instance->getConnection($connection);
    }
    public static function table($table, $as = null, $connection = null)
    {
        return static::$instance->connection($connection)->table($table, $as);
    }
    public static function schema($connection = null)
    {
        return static::$instance->connection($connection)->getSchemaBuilder();
    }
    public function getConnection($name = null)
    {
        return $this->manager->connection($name);
    }
    public function addConnection(array $config, $name = 'default')
    {
        $connections = $this->container['config']['database.connections'];
        $connections[$name] = $config;
        $this->container['config']['database.connections'] = $connections;
    }
    public function bootEloquent()
    {
        Eloquent::setConnectionResolver($this->manager);
        if ($dispatcher = $this->getEventDispatcher()) {
            Eloquent::setEventDispatcher($dispatcher);
        }
    }
    public function setFetchMode($fetchMode)
    {
        $this->container['config']['database.fetch'] = $fetchMode;
        return $this;
    }
    public function getDatabaseManager()
    {
        return $this->manager;
    }
    public function getEventDispatcher()
    {
        if ($this->container->bound('events')) {
            return $this->container['events'];
        }
    }
    public function setEventDispatcher(Dispatcher $dispatcher)
    {
        $this->container->instance('events', $dispatcher);
    }
    public static function __callStatic($method, $parameters)
    {
        return static::connection()->{$method}(...$parameters);
    }
}
}

namespace Illuminate\Database {
use Closure;
use Doctrine\DBAL\Driver\PDOSqlsrv\Driver as DoctrineDriver;
use Doctrine\DBAL\Version;
use Illuminate\Database\PDO\SqlServerDriver;
use Illuminate\Database\Query\Grammars\SqlServerGrammar as QueryGrammar;
use Illuminate\Database\Query\Processors\SqlServerProcessor;
use Illuminate\Database\Schema\Grammars\SqlServerGrammar as SchemaGrammar;
use Illuminate\Database\Schema\SqlServerBuilder;
use Illuminate\Filesystem\Filesystem;
use RuntimeException;
use Throwable;
class SqlServerConnection extends Connection
{
    public function transaction(Closure $callback, $attempts = 1)
    {
        for ($a = 1; $a <= $attempts; $a++) {
            if ($this->getDriverName() === 'sqlsrv') {
                return parent::transaction($callback);
            }
            $this->getPdo()->exec('BEGIN TRAN');
            try {
                $result = $callback($this);
                $this->getPdo()->exec('COMMIT TRAN');
            } catch (Throwable $e) {
                $this->getPdo()->exec('ROLLBACK TRAN');
                throw $e;
            }
            return $result;
        }
    }
    protected function getDefaultQueryGrammar()
    {
        return $this->withTablePrefix(new QueryGrammar());
    }
    public function getSchemaBuilder()
    {
        if (is_null($this->schemaGrammar)) {
            $this->useDefaultSchemaGrammar();
        }
        return new SqlServerBuilder($this);
    }
    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new SchemaGrammar());
    }
    public function getSchemaState(Filesystem $files = null, callable $processFactory = null)
    {
        throw new RuntimeException('Schema dumping is not supported when using SQL Server.');
    }
    protected function getDefaultPostProcessor()
    {
        return new SqlServerProcessor();
    }
    protected function getDoctrineDriver()
    {
        return class_exists(Version::class) ? new DoctrineDriver() : new SqlServerDriver();
    }
}
}

namespace Illuminate\Database\Eloquent\Relations {
use BadMethodCallException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Concerns\InteractsWithDictionary;
class MorphTo extends BelongsTo
{
    use InteractsWithDictionary;
    protected $morphType;
    protected $models;
    protected $dictionary = [];
    protected $macroBuffer = [];
    protected $morphableEagerLoads = [];
    protected $morphableEagerLoadCounts = [];
    protected $morphableConstraints = [];
    public function __construct(Builder $query, Model $parent, $foreignKey, $ownerKey, $type, $relation)
    {
        $this->morphType = $type;
        parent::__construct($query, $parent, $foreignKey, $ownerKey, $relation);
    }
    public function addEagerConstraints(array $models)
    {
        $this->buildDictionary($this->models = Collection::make($models));
    }
    protected function buildDictionary(Collection $models)
    {
        foreach ($models as $model) {
            if ($model->{$this->morphType}) {
                $morphTypeKey = $this->getDictionaryKey($model->{$this->morphType});
                $foreignKeyKey = $this->getDictionaryKey($model->{$this->foreignKey});
                $this->dictionary[$morphTypeKey][$foreignKeyKey][] = $model;
            }
        }
    }
    public function getEager()
    {
        foreach (array_keys($this->dictionary) as $type) {
            $this->matchToMorphParents($type, $this->getResultsByType($type));
        }
        return $this->models;
    }
    protected function getResultsByType($type)
    {
        $instance = $this->createModelByType($type);
        $ownerKey = $this->ownerKey ?? $instance->getKeyName();
        $query = $this->replayMacros($instance->newQuery())->mergeConstraintsFrom($this->getQuery())->with(array_merge($this->getQuery()->getEagerLoads(), (array) ($this->morphableEagerLoads[get_class($instance)] ?? [])))->withCount((array) ($this->morphableEagerLoadCounts[get_class($instance)] ?? []));
        if ($callback = $this->morphableConstraints[get_class($instance)] ?? null) {
            $callback($query);
        }
        $whereIn = $this->whereInMethod($instance, $ownerKey);
        return $query->{$whereIn}($instance->getTable() . '.' . $ownerKey, $this->gatherKeysByType($type, $instance->getKeyType()))->get();
    }
    protected function gatherKeysByType($type, $keyType)
    {
        return $keyType !== 'string' ? array_keys($this->dictionary[$type]) : array_map(function ($modelId) {
            return (string) $modelId;
        }, array_filter(array_keys($this->dictionary[$type])));
    }
    public function createModelByType($type)
    {
        $class = Model::getActualClassNameForMorph($type);
        return tap(new $class(), function ($instance) {
            if (!$instance->getConnectionName()) {
                $instance->setConnection($this->getConnection()->getName());
            }
        });
    }
    public function match(array $models, Collection $results, $relation)
    {
        return $models;
    }
    protected function matchToMorphParents($type, Collection $results)
    {
        foreach ($results as $result) {
            $ownerKey = !is_null($this->ownerKey) ? $this->getDictionaryKey($result->{$this->ownerKey}) : $result->getKey();
            if (isset($this->dictionary[$type][$ownerKey])) {
                foreach ($this->dictionary[$type][$ownerKey] as $model) {
                    $model->setRelation($this->relationName, $result);
                }
            }
        }
    }
    public function associate($model)
    {
        if ($model instanceof Model) {
            $foreignKey = $this->ownerKey && $model->{$this->ownerKey} ? $this->ownerKey : $model->getKeyName();
        }
        $this->parent->setAttribute($this->foreignKey, $model instanceof Model ? $model->{$foreignKey} : null);
        $this->parent->setAttribute($this->morphType, $model instanceof Model ? $model->getMorphClass() : null);
        return $this->parent->setRelation($this->relationName, $model);
    }
    public function dissociate()
    {
        $this->parent->setAttribute($this->foreignKey, null);
        $this->parent->setAttribute($this->morphType, null);
        return $this->parent->setRelation($this->relationName, null);
    }
    public function touch()
    {
        if (!is_null($this->child->{$this->foreignKey})) {
            parent::touch();
        }
    }
    protected function newRelatedInstanceFor(Model $parent)
    {
        return $parent->{$this->getRelationName()}()->getRelated()->newInstance();
    }
    public function getMorphType()
    {
        return $this->morphType;
    }
    public function getDictionary()
    {
        return $this->dictionary;
    }
    public function morphWith(array $with)
    {
        $this->morphableEagerLoads = array_merge($this->morphableEagerLoads, $with);
        return $this;
    }
    public function morphWithCount(array $withCount)
    {
        $this->morphableEagerLoadCounts = array_merge($this->morphableEagerLoadCounts, $withCount);
        return $this;
    }
    public function constrain(array $callbacks)
    {
        $this->morphableConstraints = array_merge($this->morphableConstraints, $callbacks);
        return $this;
    }
    protected function replayMacros(Builder $query)
    {
        foreach ($this->macroBuffer as $macro) {
            $query->{$macro['method']}(...$macro['parameters']);
        }
        return $query;
    }
    public function __call($method, $parameters)
    {
        try {
            $result = parent::__call($method, $parameters);
            if (in_array($method, ['select', 'selectRaw', 'selectSub', 'addSelect', 'withoutGlobalScopes'])) {
                $this->macroBuffer[] = compact('method', 'parameters');
            }
            return $result;
        } catch (BadMethodCallException $e) {
            $this->macroBuffer[] = compact('method', 'parameters');
            return $this;
        }
    }
}
}

namespace Illuminate\Database\Eloquent\Relations {
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\Concerns\InteractsWithDictionary;
use Illuminate\Database\Eloquent\SoftDeletes;
class HasManyThrough extends Relation
{
    use InteractsWithDictionary;
    protected $throughParent;
    protected $farParent;
    protected $firstKey;
    protected $secondKey;
    protected $localKey;
    protected $secondLocalKey;
    public function __construct(Builder $query, Model $farParent, Model $throughParent, $firstKey, $secondKey, $localKey, $secondLocalKey)
    {
        $this->localKey = $localKey;
        $this->firstKey = $firstKey;
        $this->secondKey = $secondKey;
        $this->farParent = $farParent;
        $this->throughParent = $throughParent;
        $this->secondLocalKey = $secondLocalKey;
        parent::__construct($query, $throughParent);
    }
    public function addConstraints()
    {
        $localValue = $this->farParent[$this->localKey];
        $this->performJoin();
        if (static::$constraints) {
            $this->query->where($this->getQualifiedFirstKeyName(), '=', $localValue);
        }
    }
    protected function performJoin(Builder $query = null)
    {
        $query = $query ?: $this->query;
        $farKey = $this->getQualifiedFarKeyName();
        $query->join($this->throughParent->getTable(), $this->getQualifiedParentKeyName(), '=', $farKey);
        if ($this->throughParentSoftDeletes()) {
            $query->withGlobalScope('SoftDeletableHasManyThrough', function ($query) {
                $query->whereNull($this->throughParent->getQualifiedDeletedAtColumn());
            });
        }
    }
    public function getQualifiedParentKeyName()
    {
        return $this->parent->qualifyColumn($this->secondLocalKey);
    }
    public function throughParentSoftDeletes()
    {
        return in_array(SoftDeletes::class, class_uses_recursive($this->throughParent));
    }
    public function withTrashedParents()
    {
        $this->query->withoutGlobalScope('SoftDeletableHasManyThrough');
        return $this;
    }
    public function addEagerConstraints(array $models)
    {
        $whereIn = $this->whereInMethod($this->farParent, $this->localKey);
        $this->query->{$whereIn}($this->getQualifiedFirstKeyName(), $this->getKeys($models, $this->localKey));
    }
    public function initRelation(array $models, $relation)
    {
        foreach ($models as $model) {
            $model->setRelation($relation, $this->related->newCollection());
        }
        return $models;
    }
    public function match(array $models, Collection $results, $relation)
    {
        $dictionary = $this->buildDictionary($results);
        foreach ($models as $model) {
            if (isset($dictionary[$key = $this->getDictionaryKey($model->getAttribute($this->localKey))])) {
                $model->setRelation($relation, $this->related->newCollection($dictionary[$key]));
            }
        }
        return $models;
    }
    protected function buildDictionary(Collection $results)
    {
        $dictionary = [];
        foreach ($results as $result) {
            $dictionary[$result->laravel_through_key][] = $result;
        }
        return $dictionary;
    }
    public function firstOrNew(array $attributes)
    {
        if (is_null($instance = $this->where($attributes)->first())) {
            $instance = $this->related->newInstance($attributes);
        }
        return $instance;
    }
    public function updateOrCreate(array $attributes, array $values = [])
    {
        $instance = $this->firstOrNew($attributes);
        $instance->fill($values)->save();
        return $instance;
    }
    public function firstWhere($column, $operator = null, $value = null, $boolean = 'and')
    {
        return $this->where($column, $operator, $value, $boolean)->first();
    }
    public function first($columns = ['*'])
    {
        $results = $this->take(1)->get($columns);
        return count($results) > 0 ? $results->first() : null;
    }
    public function firstOrFail($columns = ['*'])
    {
        if (!is_null($model = $this->first($columns))) {
            return $model;
        }
        throw (new ModelNotFoundException())->setModel(get_class($this->related));
    }
    public function find($id, $columns = ['*'])
    {
        if (is_array($id) || $id instanceof Arrayable) {
            return $this->findMany($id, $columns);
        }
        return $this->where($this->getRelated()->getQualifiedKeyName(), '=', $id)->first($columns);
    }
    public function findMany($ids, $columns = ['*'])
    {
        $ids = $ids instanceof Arrayable ? $ids->toArray() : $ids;
        if (empty($ids)) {
            return $this->getRelated()->newCollection();
        }
        return $this->whereIn($this->getRelated()->getQualifiedKeyName(), $ids)->get($columns);
    }
    public function findOrFail($id, $columns = ['*'])
    {
        $result = $this->find($id, $columns);
        $id = $id instanceof Arrayable ? $id->toArray() : $id;
        if (is_array($id)) {
            if (count($result) === count(array_unique($id))) {
                return $result;
            }
        } elseif (!is_null($result)) {
            return $result;
        }
        throw (new ModelNotFoundException())->setModel(get_class($this->related), $id);
    }
    public function getResults()
    {
        return !is_null($this->farParent->{$this->localKey}) ? $this->get() : $this->related->newCollection();
    }
    public function get($columns = ['*'])
    {
        $builder = $this->prepareQueryBuilder($columns);
        $models = $builder->getModels();
        if (count($models) > 0) {
            $models = $builder->eagerLoadRelations($models);
        }
        return $this->related->newCollection($models);
    }
    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        $this->query->addSelect($this->shouldSelect($columns));
        return $this->query->paginate($perPage, $columns, $pageName, $page);
    }
    public function simplePaginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        $this->query->addSelect($this->shouldSelect($columns));
        return $this->query->simplePaginate($perPage, $columns, $pageName, $page);
    }
    public function cursorPaginate($perPage = null, $columns = ['*'], $cursorName = 'cursor', $cursor = null)
    {
        $this->query->addSelect($this->shouldSelect($columns));
        return $this->query->cursorPaginate($perPage, $columns, $cursorName, $cursor);
    }
    protected function shouldSelect(array $columns = ['*'])
    {
        if ($columns == ['*']) {
            $columns = [$this->related->getTable() . '.*'];
        }
        return array_merge($columns, [$this->getQualifiedFirstKeyName() . ' as laravel_through_key']);
    }
    public function chunk($count, callable $callback)
    {
        return $this->prepareQueryBuilder()->chunk($count, $callback);
    }
    public function chunkById($count, callable $callback, $column = null, $alias = null)
    {
        $column = $column ?? $this->getRelated()->getQualifiedKeyName();
        $alias = $alias ?? $this->getRelated()->getKeyName();
        return $this->prepareQueryBuilder()->chunkById($count, $callback, $column, $alias);
    }
    public function cursor()
    {
        return $this->prepareQueryBuilder()->cursor();
    }
    public function each(callable $callback, $count = 1000)
    {
        return $this->chunk($count, function ($results) use($callback) {
            foreach ($results as $key => $value) {
                if ($callback($value, $key) === false) {
                    return false;
                }
            }
        });
    }
    public function lazy($chunkSize = 1000)
    {
        return $this->prepareQueryBuilder()->lazy($chunkSize);
    }
    public function lazyById($chunkSize = 1000, $column = null, $alias = null)
    {
        $column = $column ?? $this->getRelated()->getQualifiedKeyName();
        $alias = $alias ?? $this->getRelated()->getKeyName();
        return $this->prepareQueryBuilder()->lazyById($chunkSize, $column, $alias);
    }
    protected function prepareQueryBuilder($columns = ['*'])
    {
        $builder = $this->query->applyScopes();
        return $builder->addSelect($this->shouldSelect($builder->getQuery()->columns ? [] : $columns));
    }
    public function getRelationExistenceQuery(Builder $query, Builder $parentQuery, $columns = ['*'])
    {
        if ($parentQuery->getQuery()->from === $query->getQuery()->from) {
            return $this->getRelationExistenceQueryForSelfRelation($query, $parentQuery, $columns);
        }
        if ($parentQuery->getQuery()->from === $this->throughParent->getTable()) {
            return $this->getRelationExistenceQueryForThroughSelfRelation($query, $parentQuery, $columns);
        }
        $this->performJoin($query);
        return $query->select($columns)->whereColumn($this->getQualifiedLocalKeyName(), '=', $this->getQualifiedFirstKeyName());
    }
    public function getRelationExistenceQueryForSelfRelation(Builder $query, Builder $parentQuery, $columns = ['*'])
    {
        $query->from($query->getModel()->getTable() . ' as ' . ($hash = $this->getRelationCountHash()));
        $query->join($this->throughParent->getTable(), $this->getQualifiedParentKeyName(), '=', $hash . '.' . $this->secondKey);
        if ($this->throughParentSoftDeletes()) {
            $query->whereNull($this->throughParent->getQualifiedDeletedAtColumn());
        }
        $query->getModel()->setTable($hash);
        return $query->select($columns)->whereColumn($parentQuery->getQuery()->from . '.' . $this->localKey, '=', $this->getQualifiedFirstKeyName());
    }
    public function getRelationExistenceQueryForThroughSelfRelation(Builder $query, Builder $parentQuery, $columns = ['*'])
    {
        $table = $this->throughParent->getTable() . ' as ' . ($hash = $this->getRelationCountHash());
        $query->join($table, $hash . '.' . $this->secondLocalKey, '=', $this->getQualifiedFarKeyName());
        if ($this->throughParentSoftDeletes()) {
            $query->whereNull($hash . '.' . $this->throughParent->getDeletedAtColumn());
        }
        return $query->select($columns)->whereColumn($parentQuery->getQuery()->from . '.' . $this->localKey, '=', $hash . '.' . $this->firstKey);
    }
    public function getQualifiedFarKeyName()
    {
        return $this->getQualifiedForeignKeyName();
    }
    public function getFirstKeyName()
    {
        return $this->firstKey;
    }
    public function getQualifiedFirstKeyName()
    {
        return $this->throughParent->qualifyColumn($this->firstKey);
    }
    public function getForeignKeyName()
    {
        return $this->secondKey;
    }
    public function getQualifiedForeignKeyName()
    {
        return $this->related->qualifyColumn($this->secondKey);
    }
    public function getLocalKeyName()
    {
        return $this->localKey;
    }
    public function getQualifiedLocalKeyName()
    {
        return $this->farParent->qualifyColumn($this->localKey);
    }
    public function getSecondLocalKeyName()
    {
        return $this->secondLocalKey;
    }
}
}

namespace Illuminate\Database\Eloquent\Relations {
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\MultipleRecordsFoundException;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\ForwardsCalls;
use Illuminate\Support\Traits\Macroable;
abstract class Relation
{
    use ForwardsCalls, Macroable {
        __call as macroCall;
    }
    protected $query;
    protected $parent;
    protected $related;
    protected static $constraints = true;
    public static $morphMap = [];
    protected static $requireMorphMap = false;
    protected static $selfJoinCount = 0;
    public function __construct(Builder $query, Model $parent)
    {
        $this->query = $query;
        $this->parent = $parent;
        $this->related = $query->getModel();
        $this->addConstraints();
    }
    public static function noConstraints(Closure $callback)
    {
        $previous = static::$constraints;
        static::$constraints = false;
        try {
            return $callback();
        } finally {
            static::$constraints = $previous;
        }
    }
    public abstract function addConstraints();
    public abstract function addEagerConstraints(array $models);
    public abstract function initRelation(array $models, $relation);
    public abstract function match(array $models, Collection $results, $relation);
    public abstract function getResults();
    public function getEager()
    {
        return $this->get();
    }
    public function sole($columns = ['*'])
    {
        $result = $this->take(2)->get($columns);
        if ($result->isEmpty()) {
            throw (new ModelNotFoundException())->setModel(get_class($this->related));
        }
        if ($result->count() > 1) {
            throw new MultipleRecordsFoundException();
        }
        return $result->first();
    }
    public function get($columns = ['*'])
    {
        return $this->query->get($columns);
    }
    public function touch()
    {
        $model = $this->getRelated();
        if (!$model::isIgnoringTouch()) {
            $this->rawUpdate([$model->getUpdatedAtColumn() => $model->freshTimestampString()]);
        }
    }
    public function rawUpdate(array $attributes = [])
    {
        return $this->query->withoutGlobalScopes()->update($attributes);
    }
    public function getRelationExistenceCountQuery(Builder $query, Builder $parentQuery)
    {
        return $this->getRelationExistenceQuery($query, $parentQuery, new Expression('count(*)'))->setBindings([], 'select');
    }
    public function getRelationExistenceQuery(Builder $query, Builder $parentQuery, $columns = ['*'])
    {
        return $query->select($columns)->whereColumn($this->getQualifiedParentKeyName(), '=', $this->getExistenceCompareKey());
    }
    public function getRelationCountHash($incrementJoinCount = true)
    {
        return 'laravel_reserved_' . ($incrementJoinCount ? static::$selfJoinCount++ : static::$selfJoinCount);
    }
    protected function getKeys(array $models, $key = null)
    {
        return collect($models)->map(function ($value) use($key) {
            return $key ? $value->getAttribute($key) : $value->getKey();
        })->values()->unique(null, true)->sort()->all();
    }
    protected function getRelationQuery()
    {
        return $this->query;
    }
    public function getQuery()
    {
        return $this->query;
    }
    public function getBaseQuery()
    {
        return $this->query->getQuery();
    }
    public function getParent()
    {
        return $this->parent;
    }
    public function getQualifiedParentKeyName()
    {
        return $this->parent->getQualifiedKeyName();
    }
    public function getRelated()
    {
        return $this->related;
    }
    public function createdAt()
    {
        return $this->parent->getCreatedAtColumn();
    }
    public function updatedAt()
    {
        return $this->parent->getUpdatedAtColumn();
    }
    public function relatedUpdatedAt()
    {
        return $this->related->getUpdatedAtColumn();
    }
    protected function whereInMethod(Model $model, $key)
    {
        return $model->getKeyName() === last(explode('.', $key)) && in_array($model->getKeyType(), ['int', 'integer']) ? 'whereIntegerInRaw' : 'whereIn';
    }
    public static function requireMorphMap($requireMorphMap = true)
    {
        static::$requireMorphMap = $requireMorphMap;
    }
    public static function requiresMorphMap()
    {
        return static::$requireMorphMap;
    }
    public static function enforceMorphMap(array $map, $merge = true)
    {
        static::requireMorphMap();
        return static::morphMap($map, $merge);
    }
    public static function morphMap(array $map = null, $merge = true)
    {
        $map = static::buildMorphMapFromModels($map);
        if (is_array($map)) {
            static::$morphMap = $merge && static::$morphMap ? $map + static::$morphMap : $map;
        }
        return static::$morphMap;
    }
    protected static function buildMorphMapFromModels(array $models = null)
    {
        if (is_null($models) || Arr::isAssoc($models)) {
            return $models;
        }
        return array_combine(array_map(function ($model) {
            return (new $model())->getTable();
        }, $models), $models);
    }
    public static function getMorphedModel($alias)
    {
        return static::$morphMap[$alias] ?? null;
    }
    public function __call($method, $parameters)
    {
        if (static::hasMacro($method)) {
            return $this->macroCall($method, $parameters);
        }
        return $this->forwardDecoratedCallTo($this->query, $method, $parameters);
    }
    public function __clone()
    {
        $this->query = clone $this->query;
    }
}
}

namespace Illuminate\Database\Eloquent\Relations {
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Concerns\InteractsWithDictionary;
abstract class HasOneOrMany extends Relation
{
    use InteractsWithDictionary;
    protected $foreignKey;
    protected $localKey;
    public function __construct(Builder $query, Model $parent, $foreignKey, $localKey)
    {
        $this->localKey = $localKey;
        $this->foreignKey = $foreignKey;
        parent::__construct($query, $parent);
    }
    public function make(array $attributes = [])
    {
        return tap($this->related->newInstance($attributes), function ($instance) {
            $this->setForeignAttributesForCreate($instance);
        });
    }
    public function makeMany($records)
    {
        $instances = $this->related->newCollection();
        foreach ($records as $record) {
            $instances->push($this->make($record));
        }
        return $instances;
    }
    public function addConstraints()
    {
        if (static::$constraints) {
            $query = $this->getRelationQuery();
            $query->where($this->foreignKey, '=', $this->getParentKey());
            $query->whereNotNull($this->foreignKey);
        }
    }
    public function addEagerConstraints(array $models)
    {
        $whereIn = $this->whereInMethod($this->parent, $this->localKey);
        $this->getRelationQuery()->{$whereIn}($this->foreignKey, $this->getKeys($models, $this->localKey));
    }
    public function matchOne(array $models, Collection $results, $relation)
    {
        return $this->matchOneOrMany($models, $results, $relation, 'one');
    }
    public function matchMany(array $models, Collection $results, $relation)
    {
        return $this->matchOneOrMany($models, $results, $relation, 'many');
    }
    protected function matchOneOrMany(array $models, Collection $results, $relation, $type)
    {
        $dictionary = $this->buildDictionary($results);
        foreach ($models as $model) {
            if (isset($dictionary[$key = $this->getDictionaryKey($model->getAttribute($this->localKey))])) {
                $model->setRelation($relation, $this->getRelationValue($dictionary, $key, $type));
            }
        }
        return $models;
    }
    protected function getRelationValue(array $dictionary, $key, $type)
    {
        $value = $dictionary[$key];
        return $type === 'one' ? reset($value) : $this->related->newCollection($value);
    }
    protected function buildDictionary(Collection $results)
    {
        $foreign = $this->getForeignKeyName();
        return $results->mapToDictionary(function ($result) use($foreign) {
            return [$this->getDictionaryKey($result->{$foreign}) => $result];
        })->all();
    }
    public function findOrNew($id, $columns = ['*'])
    {
        if (is_null($instance = $this->find($id, $columns))) {
            $instance = $this->related->newInstance();
            $this->setForeignAttributesForCreate($instance);
        }
        return $instance;
    }
    public function firstOrNew(array $attributes = [], array $values = [])
    {
        if (is_null($instance = $this->where($attributes)->first())) {
            $instance = $this->related->newInstance(array_merge($attributes, $values));
            $this->setForeignAttributesForCreate($instance);
        }
        return $instance;
    }
    public function firstOrCreate(array $attributes = [], array $values = [])
    {
        if (is_null($instance = $this->where($attributes)->first())) {
            $instance = $this->create(array_merge($attributes, $values));
        }
        return $instance;
    }
    public function updateOrCreate(array $attributes, array $values = [])
    {
        return tap($this->firstOrNew($attributes), function ($instance) use($values) {
            $instance->fill($values);
            $instance->save();
        });
    }
    public function save(Model $model)
    {
        $this->setForeignAttributesForCreate($model);
        return $model->save() ? $model : false;
    }
    public function saveMany($models)
    {
        foreach ($models as $model) {
            $this->save($model);
        }
        return $models;
    }
    public function create(array $attributes = [])
    {
        return tap($this->related->newInstance($attributes), function ($instance) {
            $this->setForeignAttributesForCreate($instance);
            $instance->save();
        });
    }
    public function forceCreate(array $attributes = [])
    {
        $attributes[$this->getForeignKeyName()] = $this->getParentKey();
        return $this->related->forceCreate($attributes);
    }
    public function createMany(iterable $records)
    {
        $instances = $this->related->newCollection();
        foreach ($records as $record) {
            $instances->push($this->create($record));
        }
        return $instances;
    }
    protected function setForeignAttributesForCreate(Model $model)
    {
        $model->setAttribute($this->getForeignKeyName(), $this->getParentKey());
    }
    public function getRelationExistenceQuery(Builder $query, Builder $parentQuery, $columns = ['*'])
    {
        if ($query->getQuery()->from == $parentQuery->getQuery()->from) {
            return $this->getRelationExistenceQueryForSelfRelation($query, $parentQuery, $columns);
        }
        return parent::getRelationExistenceQuery($query, $parentQuery, $columns);
    }
    public function getRelationExistenceQueryForSelfRelation(Builder $query, Builder $parentQuery, $columns = ['*'])
    {
        $query->from($query->getModel()->getTable() . ' as ' . ($hash = $this->getRelationCountHash()));
        $query->getModel()->setTable($hash);
        return $query->select($columns)->whereColumn($this->getQualifiedParentKeyName(), '=', $hash . '.' . $this->getForeignKeyName());
    }
    public function getExistenceCompareKey()
    {
        return $this->getQualifiedForeignKeyName();
    }
    public function getParentKey()
    {
        return $this->parent->getAttribute($this->localKey);
    }
    public function getQualifiedParentKeyName()
    {
        return $this->parent->qualifyColumn($this->localKey);
    }
    public function getForeignKeyName()
    {
        $segments = explode('.', $this->getQualifiedForeignKeyName());
        return end($segments);
    }
    public function getQualifiedForeignKeyName()
    {
        return $this->foreignKey;
    }
    public function getLocalKeyName()
    {
        return $this->localKey;
    }
}
}

namespace Illuminate\Database\Eloquent\Relations {
use Illuminate\Database\Eloquent\Collection;
class MorphMany extends MorphOneOrMany
{
    public function getResults()
    {
        return !is_null($this->getParentKey()) ? $this->query->get() : $this->related->newCollection();
    }
    public function initRelation(array $models, $relation)
    {
        foreach ($models as $model) {
            $model->setRelation($relation, $this->related->newCollection());
        }
        return $models;
    }
    public function match(array $models, Collection $results, $relation)
    {
        return $this->matchMany($models, $results, $relation);
    }
}
}

namespace Illuminate\Database\Eloquent\Relations {
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Concerns\AsPivot;
class Pivot extends Model
{
    use AsPivot;
    public $incrementing = false;
    protected $guarded = [];
}
}

namespace Illuminate\Database\Eloquent\Relations {
use Illuminate\Contracts\Database\Eloquent\SupportsPartialRelations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Concerns\CanBeOneOfMany;
use Illuminate\Database\Eloquent\Relations\Concerns\ComparesRelatedModels;
use Illuminate\Database\Eloquent\Relations\Concerns\SupportsDefaultModels;
use Illuminate\Database\Query\JoinClause;
class MorphOne extends MorphOneOrMany implements SupportsPartialRelations
{
    use CanBeOneOfMany, ComparesRelatedModels, SupportsDefaultModels;
    public function getResults()
    {
        if (is_null($this->getParentKey())) {
            return $this->getDefaultFor($this->parent);
        }
        return $this->query->first() ?: $this->getDefaultFor($this->parent);
    }
    public function initRelation(array $models, $relation)
    {
        foreach ($models as $model) {
            $model->setRelation($relation, $this->getDefaultFor($model));
        }
        return $models;
    }
    public function match(array $models, Collection $results, $relation)
    {
        return $this->matchOne($models, $results, $relation);
    }
    public function getRelationExistenceQuery(Builder $query, Builder $parentQuery, $columns = ['*'])
    {
        if ($this->isOneOfMany()) {
            $this->mergeOneOfManyJoinsTo($query);
        }
        return parent::getRelationExistenceQuery($query, $parentQuery, $columns);
    }
    public function addOneOfManySubQueryConstraints(Builder $query, $column = null, $aggregate = null)
    {
        $query->addSelect($this->foreignKey, $this->morphType);
    }
    public function getOneOfManySubQuerySelectColumns()
    {
        return [$this->foreignKey, $this->morphType];
    }
    public function addOneOfManyJoinSubQueryConstraints(JoinClause $join)
    {
        $join->on($this->qualifySubSelectColumn($this->morphType), '=', $this->qualifyRelatedColumn($this->morphType))->on($this->qualifySubSelectColumn($this->foreignKey), '=', $this->qualifyRelatedColumn($this->foreignKey));
    }
    public function newRelatedInstanceFor(Model $parent)
    {
        return $this->related->newInstance()->setAttribute($this->getForeignKeyName(), $parent->{$this->localKey})->setAttribute($this->getMorphType(), $this->morphClass);
    }
    protected function getRelatedKeyFrom(Model $model)
    {
        return $model->getAttribute($this->getForeignKeyName());
    }
}
}

namespace Illuminate\Database\Eloquent\Relations {
use Illuminate\Database\Eloquent\Collection;
class HasMany extends HasOneOrMany
{
    public function getResults()
    {
        return !is_null($this->getParentKey()) ? $this->query->get() : $this->related->newCollection();
    }
    public function initRelation(array $models, $relation)
    {
        foreach ($models as $model) {
            $model->setRelation($relation, $this->related->newCollection());
        }
        return $models;
    }
    public function match(array $models, Collection $results, $relation)
    {
        return $this->matchMany($models, $results, $relation);
    }
}
}

namespace Illuminate\Database\Eloquent\Relations {
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
class MorphToMany extends BelongsToMany
{
    protected $morphType;
    protected $morphClass;
    protected $inverse;
    public function __construct(Builder $query, Model $parent, $name, $table, $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey, $relationName = null, $inverse = false)
    {
        $this->inverse = $inverse;
        $this->morphType = $name . '_type';
        $this->morphClass = $inverse ? $query->getModel()->getMorphClass() : $parent->getMorphClass();
        parent::__construct($query, $parent, $table, $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey, $relationName);
    }
    protected function addWhereConstraints()
    {
        parent::addWhereConstraints();
        $this->query->where($this->qualifyPivotColumn($this->morphType), $this->morphClass);
        return $this;
    }
    public function addEagerConstraints(array $models)
    {
        parent::addEagerConstraints($models);
        $this->query->where($this->qualifyPivotColumn($this->morphType), $this->morphClass);
    }
    protected function baseAttachRecord($id, $timed)
    {
        return Arr::add(parent::baseAttachRecord($id, $timed), $this->morphType, $this->morphClass);
    }
    public function getRelationExistenceQuery(Builder $query, Builder $parentQuery, $columns = ['*'])
    {
        return parent::getRelationExistenceQuery($query, $parentQuery, $columns)->where($this->qualifyPivotColumn($this->morphType), $this->morphClass);
    }
    protected function getCurrentlyAttachedPivots()
    {
        return parent::getCurrentlyAttachedPivots()->map(function ($record) {
            return $record instanceof MorphPivot ? $record->setMorphType($this->morphType)->setMorphClass($this->morphClass) : $record;
        });
    }
    public function newPivotQuery()
    {
        return parent::newPivotQuery()->where($this->morphType, $this->morphClass);
    }
    public function newPivot(array $attributes = [], $exists = false)
    {
        $using = $this->using;
        $pivot = $using ? $using::fromRawAttributes($this->parent, $attributes, $this->table, $exists) : MorphPivot::fromAttributes($this->parent, $attributes, $this->table, $exists);
        $pivot->setPivotKeys($this->foreignPivotKey, $this->relatedPivotKey)->setMorphType($this->morphType)->setMorphClass($this->morphClass);
        return $pivot;
    }
    protected function aliasedPivotColumns()
    {
        $defaults = [$this->foreignPivotKey, $this->relatedPivotKey, $this->morphType];
        return collect(array_merge($defaults, $this->pivotColumns))->map(function ($column) {
            return $this->qualifyPivotColumn($column) . ' as pivot_' . $column;
        })->unique()->all();
    }
    public function getMorphType()
    {
        return $this->morphType;
    }
    public function getMorphClass()
    {
        return $this->morphClass;
    }
    public function getInverse()
    {
        return $this->inverse;
    }
}
}

namespace Illuminate\Database\Eloquent\Relations {
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
abstract class MorphOneOrMany extends HasOneOrMany
{
    protected $morphType;
    protected $morphClass;
    public function __construct(Builder $query, Model $parent, $type, $id, $localKey)
    {
        $this->morphType = $type;
        $this->morphClass = $parent->getMorphClass();
        parent::__construct($query, $parent, $id, $localKey);
    }
    public function addConstraints()
    {
        if (static::$constraints) {
            $this->getRelationQuery()->where($this->morphType, $this->morphClass);
            parent::addConstraints();
        }
    }
    public function addEagerConstraints(array $models)
    {
        parent::addEagerConstraints($models);
        $this->getRelationQuery()->where($this->morphType, $this->morphClass);
    }
    protected function setForeignAttributesForCreate(Model $model)
    {
        $model->{$this->getForeignKeyName()} = $this->getParentKey();
        $model->{$this->getMorphType()} = $this->morphClass;
    }
    public function getRelationExistenceQuery(Builder $query, Builder $parentQuery, $columns = ['*'])
    {
        return parent::getRelationExistenceQuery($query, $parentQuery, $columns)->where($query->qualifyColumn($this->getMorphType()), $this->morphClass);
    }
    public function getQualifiedMorphType()
    {
        return $this->morphType;
    }
    public function getMorphType()
    {
        return last(explode('.', $this->morphType));
    }
    public function getMorphClass()
    {
        return $this->morphClass;
    }
}
}

namespace Illuminate\Database\Eloquent\Relations {
use Illuminate\Support\Str;
class MorphPivot extends Pivot
{
    protected $morphType;
    protected $morphClass;
    protected function setKeysForSaveQuery($query)
    {
        $query->where($this->morphType, $this->morphClass);
        return parent::setKeysForSaveQuery($query);
    }
    protected function setKeysForSelectQuery($query)
    {
        $query->where($this->morphType, $this->morphClass);
        return parent::setKeysForSelectQuery($query);
    }
    public function delete()
    {
        if (isset($this->attributes[$this->getKeyName()])) {
            return (int) parent::delete();
        }
        if ($this->fireModelEvent('deleting') === false) {
            return 0;
        }
        $query = $this->getDeleteQuery();
        $query->where($this->morphType, $this->morphClass);
        return tap($query->delete(), function () {
            $this->fireModelEvent('deleted', false);
        });
    }
    public function getMorphType()
    {
        return $this->morphType;
    }
    public function setMorphType($morphType)
    {
        $this->morphType = $morphType;
        return $this;
    }
    public function setMorphClass($morphClass)
    {
        $this->morphClass = $morphClass;
        return $this;
    }
    public function getQueueableId()
    {
        if (isset($this->attributes[$this->getKeyName()])) {
            return $this->getKey();
        }
        return sprintf('%s:%s:%s:%s:%s:%s', $this->foreignKey, $this->getAttribute($this->foreignKey), $this->relatedKey, $this->getAttribute($this->relatedKey), $this->morphType, $this->morphClass);
    }
    public function newQueryForRestoration($ids)
    {
        if (is_array($ids)) {
            return $this->newQueryForCollectionRestoration($ids);
        }
        if (!Str::contains($ids, ':')) {
            return parent::newQueryForRestoration($ids);
        }
        $segments = explode(':', $ids);
        return $this->newQueryWithoutScopes()->where($segments[0], $segments[1])->where($segments[2], $segments[3])->where($segments[4], $segments[5]);
    }
    protected function newQueryForCollectionRestoration(array $ids)
    {
        $ids = array_values($ids);
        if (!Str::contains($ids[0], ':')) {
            return parent::newQueryForRestoration($ids);
        }
        $query = $this->newQueryWithoutScopes();
        foreach ($ids as $id) {
            $segments = explode(':', $id);
            $query->orWhere(function ($query) use($segments) {
                return $query->where($segments[0], $segments[1])->where($segments[2], $segments[3])->where($segments[4], $segments[5]);
            });
        }
        return $query;
    }
}
}

namespace Illuminate\Database\Eloquent\Relations {
use Illuminate\Contracts\Database\Eloquent\SupportsPartialRelations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Concerns\CanBeOneOfMany;
use Illuminate\Database\Eloquent\Relations\Concerns\ComparesRelatedModels;
use Illuminate\Database\Eloquent\Relations\Concerns\SupportsDefaultModels;
use Illuminate\Database\Query\JoinClause;
class HasOne extends HasOneOrMany implements SupportsPartialRelations
{
    use ComparesRelatedModels, CanBeOneOfMany, SupportsDefaultModels;
    public function getResults()
    {
        if (is_null($this->getParentKey())) {
            return $this->getDefaultFor($this->parent);
        }
        return $this->query->first() ?: $this->getDefaultFor($this->parent);
    }
    public function initRelation(array $models, $relation)
    {
        foreach ($models as $model) {
            $model->setRelation($relation, $this->getDefaultFor($model));
        }
        return $models;
    }
    public function match(array $models, Collection $results, $relation)
    {
        return $this->matchOne($models, $results, $relation);
    }
    public function getRelationExistenceQuery(Builder $query, Builder $parentQuery, $columns = ['*'])
    {
        if ($this->isOneOfMany()) {
            $this->mergeOneOfManyJoinsTo($query);
        }
        return parent::getRelationExistenceQuery($query, $parentQuery, $columns);
    }
    public function addOneOfManySubQueryConstraints(Builder $query, $column = null, $aggregate = null)
    {
        $query->addSelect($this->foreignKey);
    }
    public function getOneOfManySubQuerySelectColumns()
    {
        return $this->foreignKey;
    }
    public function addOneOfManyJoinSubQueryConstraints(JoinClause $join)
    {
        $join->on($this->qualifySubSelectColumn($this->foreignKey), '=', $this->qualifyRelatedColumn($this->foreignKey));
    }
    public function newRelatedInstanceFor(Model $parent)
    {
        return $this->related->newInstance()->setAttribute($this->getForeignKeyName(), $parent->{$this->localKey});
    }
    protected function getRelatedKeyFrom(Model $model)
    {
        return $model->getAttribute($this->getForeignKeyName());
    }
}
}

namespace Illuminate\Database\Eloquent\Relations {
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Concerns\ComparesRelatedModels;
use Illuminate\Database\Eloquent\Relations\Concerns\InteractsWithDictionary;
use Illuminate\Database\Eloquent\Relations\Concerns\SupportsDefaultModels;
class BelongsTo extends Relation
{
    use ComparesRelatedModels, InteractsWithDictionary, SupportsDefaultModels;
    protected $child;
    protected $foreignKey;
    protected $ownerKey;
    protected $relationName;
    public function __construct(Builder $query, Model $child, $foreignKey, $ownerKey, $relationName)
    {
        $this->ownerKey = $ownerKey;
        $this->relationName = $relationName;
        $this->foreignKey = $foreignKey;
        $this->child = $child;
        parent::__construct($query, $child);
    }
    public function getResults()
    {
        if (is_null($this->child->{$this->foreignKey})) {
            return $this->getDefaultFor($this->parent);
        }
        return $this->query->first() ?: $this->getDefaultFor($this->parent);
    }
    public function addConstraints()
    {
        if (static::$constraints) {
            $table = $this->related->getTable();
            $this->query->where($table . '.' . $this->ownerKey, '=', $this->child->{$this->foreignKey});
        }
    }
    public function addEagerConstraints(array $models)
    {
        $key = $this->related->getTable() . '.' . $this->ownerKey;
        $whereIn = $this->whereInMethod($this->related, $this->ownerKey);
        $this->query->{$whereIn}($key, $this->getEagerModelKeys($models));
    }
    protected function getEagerModelKeys(array $models)
    {
        $keys = [];
        foreach ($models as $model) {
            if (!is_null($value = $model->{$this->foreignKey})) {
                $keys[] = $value;
            }
        }
        sort($keys);
        return array_values(array_unique($keys));
    }
    public function initRelation(array $models, $relation)
    {
        foreach ($models as $model) {
            $model->setRelation($relation, $this->getDefaultFor($model));
        }
        return $models;
    }
    public function match(array $models, Collection $results, $relation)
    {
        $foreign = $this->foreignKey;
        $owner = $this->ownerKey;
        $dictionary = [];
        foreach ($results as $result) {
            $attribute = $this->getDictionaryKey($result->getAttribute($owner));
            $dictionary[$attribute] = $result;
        }
        foreach ($models as $model) {
            $attribute = $this->getDictionaryKey($model->{$foreign});
            if (isset($dictionary[$attribute])) {
                $model->setRelation($relation, $dictionary[$attribute]);
            }
        }
        return $models;
    }
    public function associate($model)
    {
        $ownerKey = $model instanceof Model ? $model->getAttribute($this->ownerKey) : $model;
        $this->child->setAttribute($this->foreignKey, $ownerKey);
        if ($model instanceof Model) {
            $this->child->setRelation($this->relationName, $model);
        } else {
            $this->child->unsetRelation($this->relationName);
        }
        return $this->child;
    }
    public function dissociate()
    {
        $this->child->setAttribute($this->foreignKey, null);
        return $this->child->setRelation($this->relationName, null);
    }
    public function disassociate()
    {
        return $this->dissociate();
    }
    public function getRelationExistenceQuery(Builder $query, Builder $parentQuery, $columns = ['*'])
    {
        if ($parentQuery->getQuery()->from == $query->getQuery()->from) {
            return $this->getRelationExistenceQueryForSelfRelation($query, $parentQuery, $columns);
        }
        return $query->select($columns)->whereColumn($this->getQualifiedForeignKeyName(), '=', $query->qualifyColumn($this->ownerKey));
    }
    public function getRelationExistenceQueryForSelfRelation(Builder $query, Builder $parentQuery, $columns = ['*'])
    {
        $query->select($columns)->from($query->getModel()->getTable() . ' as ' . ($hash = $this->getRelationCountHash()));
        $query->getModel()->setTable($hash);
        return $query->whereColumn($hash . '.' . $this->ownerKey, '=', $this->getQualifiedForeignKeyName());
    }
    protected function relationHasIncrementingId()
    {
        return $this->related->getIncrementing() && in_array($this->related->getKeyType(), ['int', 'integer']);
    }
    protected function newRelatedInstanceFor(Model $parent)
    {
        return $this->related->newInstance();
    }
    public function getChild()
    {
        return $this->child;
    }
    public function getForeignKeyName()
    {
        return $this->foreignKey;
    }
    public function getQualifiedForeignKeyName()
    {
        return $this->child->qualifyColumn($this->foreignKey);
    }
    public function getParentKey()
    {
        return $this->child->{$this->foreignKey};
    }
    public function getOwnerKeyName()
    {
        return $this->ownerKey;
    }
    public function getQualifiedOwnerKeyName()
    {
        return $this->related->qualifyColumn($this->ownerKey);
    }
    protected function getRelatedKeyFrom(Model $model)
    {
        return $model->{$this->ownerKey};
    }
    public function getRelationName()
    {
        return $this->relationName;
    }
}
}

namespace Illuminate\Database\Eloquent\Relations {
use Closure;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\Concerns\AsPivot;
use Illuminate\Database\Eloquent\Relations\Concerns\InteractsWithDictionary;
use Illuminate\Database\Eloquent\Relations\Concerns\InteractsWithPivotTable;
use Illuminate\Support\Str;
use InvalidArgumentException;
class BelongsToMany extends Relation
{
    use InteractsWithDictionary, InteractsWithPivotTable;
    protected $table;
    protected $foreignPivotKey;
    protected $relatedPivotKey;
    protected $parentKey;
    protected $relatedKey;
    protected $relationName;
    protected $pivotColumns = [];
    protected $pivotWheres = [];
    protected $pivotWhereIns = [];
    protected $pivotWhereNulls = [];
    protected $pivotValues = [];
    public $withTimestamps = false;
    protected $pivotCreatedAt;
    protected $pivotUpdatedAt;
    protected $using;
    protected $accessor = 'pivot';
    public function __construct(Builder $query, Model $parent, $table, $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey, $relationName = null)
    {
        $this->parentKey = $parentKey;
        $this->relatedKey = $relatedKey;
        $this->relationName = $relationName;
        $this->relatedPivotKey = $relatedPivotKey;
        $this->foreignPivotKey = $foreignPivotKey;
        $this->table = $this->resolveTableName($table);
        parent::__construct($query, $parent);
    }
    protected function resolveTableName($table)
    {
        if (!Str::contains($table, '\\') || !class_exists($table)) {
            return $table;
        }
        $model = new $table();
        if (!$model instanceof Model) {
            return $table;
        }
        if (in_array(AsPivot::class, class_uses_recursive($model))) {
            $this->using($table);
        }
        return $model->getTable();
    }
    public function addConstraints()
    {
        $this->performJoin();
        if (static::$constraints) {
            $this->addWhereConstraints();
        }
    }
    protected function performJoin($query = null)
    {
        $query = $query ?: $this->query;
        $query->join($this->table, $this->getQualifiedRelatedKeyName(), '=', $this->getQualifiedRelatedPivotKeyName());
        return $this;
    }
    protected function addWhereConstraints()
    {
        $this->query->where($this->getQualifiedForeignPivotKeyName(), '=', $this->parent->{$this->parentKey});
        return $this;
    }
    public function addEagerConstraints(array $models)
    {
        $whereIn = $this->whereInMethod($this->parent, $this->parentKey);
        $this->query->{$whereIn}($this->getQualifiedForeignPivotKeyName(), $this->getKeys($models, $this->parentKey));
    }
    public function initRelation(array $models, $relation)
    {
        foreach ($models as $model) {
            $model->setRelation($relation, $this->related->newCollection());
        }
        return $models;
    }
    public function match(array $models, Collection $results, $relation)
    {
        $dictionary = $this->buildDictionary($results);
        foreach ($models as $model) {
            $key = $this->getDictionaryKey($model->{$this->parentKey});
            if (isset($dictionary[$key])) {
                $model->setRelation($relation, $this->related->newCollection($dictionary[$key]));
            }
        }
        return $models;
    }
    protected function buildDictionary(Collection $results)
    {
        $dictionary = [];
        foreach ($results as $result) {
            $value = $this->getDictionaryKey($result->{$this->accessor}->{$this->foreignPivotKey});
            $dictionary[$value][] = $result;
        }
        return $dictionary;
    }
    public function getPivotClass()
    {
        return $this->using ?? Pivot::class;
    }
    public function using($class)
    {
        $this->using = $class;
        return $this;
    }
    public function as($accessor)
    {
        $this->accessor = $accessor;
        return $this;
    }
    public function wherePivot($column, $operator = null, $value = null, $boolean = 'and')
    {
        $this->pivotWheres[] = func_get_args();
        return $this->where($this->qualifyPivotColumn($column), $operator, $value, $boolean);
    }
    public function wherePivotBetween($column, array $values, $boolean = 'and', $not = false)
    {
        return $this->whereBetween($this->qualifyPivotColumn($column), $values, $boolean, $not);
    }
    public function orWherePivotBetween($column, array $values)
    {
        return $this->wherePivotBetween($column, $values, 'or');
    }
    public function wherePivotNotBetween($column, array $values, $boolean = 'and')
    {
        return $this->wherePivotBetween($column, $values, $boolean, true);
    }
    public function orWherePivotNotBetween($column, array $values)
    {
        return $this->wherePivotBetween($column, $values, 'or', true);
    }
    public function wherePivotIn($column, $values, $boolean = 'and', $not = false)
    {
        $this->pivotWhereIns[] = func_get_args();
        return $this->whereIn($this->qualifyPivotColumn($column), $values, $boolean, $not);
    }
    public function orWherePivot($column, $operator = null, $value = null)
    {
        return $this->wherePivot($column, $operator, $value, 'or');
    }
    public function withPivotValue($column, $value = null)
    {
        if (is_array($column)) {
            foreach ($column as $name => $value) {
                $this->withPivotValue($name, $value);
            }
            return $this;
        }
        if (is_null($value)) {
            throw new InvalidArgumentException('The provided value may not be null.');
        }
        $this->pivotValues[] = compact('column', 'value');
        return $this->wherePivot($column, '=', $value);
    }
    public function orWherePivotIn($column, $values)
    {
        return $this->wherePivotIn($column, $values, 'or');
    }
    public function wherePivotNotIn($column, $values, $boolean = 'and')
    {
        return $this->wherePivotIn($column, $values, $boolean, true);
    }
    public function orWherePivotNotIn($column, $values)
    {
        return $this->wherePivotNotIn($column, $values, 'or');
    }
    public function wherePivotNull($column, $boolean = 'and', $not = false)
    {
        $this->pivotWhereNulls[] = func_get_args();
        return $this->whereNull($this->qualifyPivotColumn($column), $boolean, $not);
    }
    public function wherePivotNotNull($column, $boolean = 'and')
    {
        return $this->wherePivotNull($column, $boolean, true);
    }
    public function orWherePivotNull($column, $not = false)
    {
        return $this->wherePivotNull($column, 'or', $not);
    }
    public function orWherePivotNotNull($column)
    {
        return $this->orWherePivotNull($column, true);
    }
    public function orderByPivot($column, $direction = 'asc')
    {
        return $this->orderBy($this->qualifyPivotColumn($column), $direction);
    }
    public function findOrNew($id, $columns = ['*'])
    {
        if (is_null($instance = $this->find($id, $columns))) {
            $instance = $this->related->newInstance();
        }
        return $instance;
    }
    public function firstOrNew(array $attributes)
    {
        if (is_null($instance = $this->where($attributes)->first())) {
            $instance = $this->related->newInstance($attributes);
        }
        return $instance;
    }
    public function firstOrCreate(array $attributes, array $joining = [], $touch = true)
    {
        if (is_null($instance = $this->where($attributes)->first())) {
            $instance = $this->create($attributes, $joining, $touch);
        }
        return $instance;
    }
    public function updateOrCreate(array $attributes, array $values = [], array $joining = [], $touch = true)
    {
        if (is_null($instance = $this->where($attributes)->first())) {
            return $this->create($values, $joining, $touch);
        }
        $instance->fill($values);
        $instance->save(['touch' => false]);
        return $instance;
    }
    public function find($id, $columns = ['*'])
    {
        if (!$id instanceof Model && (is_array($id) || $id instanceof Arrayable)) {
            return $this->findMany($id, $columns);
        }
        return $this->where($this->getRelated()->getQualifiedKeyName(), '=', $this->parseId($id))->first($columns);
    }
    public function findMany($ids, $columns = ['*'])
    {
        $ids = $ids instanceof Arrayable ? $ids->toArray() : $ids;
        if (empty($ids)) {
            return $this->getRelated()->newCollection();
        }
        return $this->whereIn($this->getRelated()->getQualifiedKeyName(), $this->parseIds($ids))->get($columns);
    }
    public function findOrFail($id, $columns = ['*'])
    {
        $result = $this->find($id, $columns);
        $id = $id instanceof Arrayable ? $id->toArray() : $id;
        if (is_array($id)) {
            if (count($result) === count(array_unique($id))) {
                return $result;
            }
        } elseif (!is_null($result)) {
            return $result;
        }
        throw (new ModelNotFoundException())->setModel(get_class($this->related), $id);
    }
    public function firstWhere($column, $operator = null, $value = null, $boolean = 'and')
    {
        return $this->where($column, $operator, $value, $boolean)->first();
    }
    public function first($columns = ['*'])
    {
        $results = $this->take(1)->get($columns);
        return count($results) > 0 ? $results->first() : null;
    }
    public function firstOrFail($columns = ['*'])
    {
        if (!is_null($model = $this->first($columns))) {
            return $model;
        }
        throw (new ModelNotFoundException())->setModel(get_class($this->related));
    }
    public function firstOr($columns = ['*'], Closure $callback = null)
    {
        if ($columns instanceof Closure) {
            $callback = $columns;
            $columns = ['*'];
        }
        if (!is_null($model = $this->first($columns))) {
            return $model;
        }
        return $callback();
    }
    public function getResults()
    {
        return !is_null($this->parent->{$this->parentKey}) ? $this->get() : $this->related->newCollection();
    }
    public function get($columns = ['*'])
    {
        $builder = $this->query->applyScopes();
        $columns = $builder->getQuery()->columns ? [] : $columns;
        $models = $builder->addSelect($this->shouldSelect($columns))->getModels();
        $this->hydratePivotRelation($models);
        if (count($models) > 0) {
            $models = $builder->eagerLoadRelations($models);
        }
        return $this->related->newCollection($models);
    }
    protected function shouldSelect(array $columns = ['*'])
    {
        if ($columns == ['*']) {
            $columns = [$this->related->getTable() . '.*'];
        }
        return array_merge($columns, $this->aliasedPivotColumns());
    }
    protected function aliasedPivotColumns()
    {
        $defaults = [$this->foreignPivotKey, $this->relatedPivotKey];
        return collect(array_merge($defaults, $this->pivotColumns))->map(function ($column) {
            return $this->qualifyPivotColumn($column) . ' as pivot_' . $column;
        })->unique()->all();
    }
    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        $this->query->addSelect($this->shouldSelect($columns));
        return tap($this->query->paginate($perPage, $columns, $pageName, $page), function ($paginator) {
            $this->hydratePivotRelation($paginator->items());
        });
    }
    public function simplePaginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        $this->query->addSelect($this->shouldSelect($columns));
        return tap($this->query->simplePaginate($perPage, $columns, $pageName, $page), function ($paginator) {
            $this->hydratePivotRelation($paginator->items());
        });
    }
    public function cursorPaginate($perPage = null, $columns = ['*'], $cursorName = 'cursor', $cursor = null)
    {
        $this->query->addSelect($this->shouldSelect($columns));
        return tap($this->query->cursorPaginate($perPage, $columns, $cursorName, $cursor), function ($paginator) {
            $this->hydratePivotRelation($paginator->items());
        });
    }
    public function chunk($count, callable $callback)
    {
        return $this->prepareQueryBuilder()->chunk($count, function ($results, $page) use($callback) {
            $this->hydratePivotRelation($results->all());
            return $callback($results, $page);
        });
    }
    public function chunkById($count, callable $callback, $column = null, $alias = null)
    {
        $this->prepareQueryBuilder();
        $column = $column ?? $this->getRelated()->qualifyColumn($this->getRelatedKeyName());
        $alias = $alias ?? $this->getRelatedKeyName();
        return $this->query->chunkById($count, function ($results) use($callback) {
            $this->hydratePivotRelation($results->all());
            return $callback($results);
        }, $column, $alias);
    }
    public function each(callable $callback, $count = 1000)
    {
        return $this->chunk($count, function ($results) use($callback) {
            foreach ($results as $key => $value) {
                if ($callback($value, $key) === false) {
                    return false;
                }
            }
        });
    }
    public function lazy($chunkSize = 1000)
    {
        return $this->prepareQueryBuilder()->lazy($chunkSize)->map(function ($model) {
            $this->hydratePivotRelation([$model]);
            return $model;
        });
    }
    public function lazyById($chunkSize = 1000, $column = null, $alias = null)
    {
        $column = $column ?? $this->getRelated()->qualifyColumn($this->getRelatedKeyName());
        $alias = $alias ?? $this->getRelatedKeyName();
        return $this->prepareQueryBuilder()->lazyById($chunkSize, $column, $alias)->map(function ($model) {
            $this->hydratePivotRelation([$model]);
            return $model;
        });
    }
    public function cursor()
    {
        return $this->prepareQueryBuilder()->cursor()->map(function ($model) {
            $this->hydratePivotRelation([$model]);
            return $model;
        });
    }
    protected function prepareQueryBuilder()
    {
        return $this->query->addSelect($this->shouldSelect());
    }
    protected function hydratePivotRelation(array $models)
    {
        foreach ($models as $model) {
            $model->setRelation($this->accessor, $this->newExistingPivot($this->migratePivotAttributes($model)));
        }
    }
    protected function migratePivotAttributes(Model $model)
    {
        $values = [];
        foreach ($model->getAttributes() as $key => $value) {
            if (strpos($key, 'pivot_') === 0) {
                $values[substr($key, 6)] = $value;
                unset($model->{$key});
            }
        }
        return $values;
    }
    public function touchIfTouching()
    {
        if ($this->touchingParent()) {
            $this->getParent()->touch();
        }
        if ($this->getParent()->touches($this->relationName)) {
            $this->touch();
        }
    }
    protected function touchingParent()
    {
        return $this->getRelated()->touches($this->guessInverseRelation());
    }
    protected function guessInverseRelation()
    {
        return Str::camel(Str::pluralStudly(class_basename($this->getParent())));
    }
    public function touch()
    {
        $key = $this->getRelated()->getKeyName();
        $columns = [$this->related->getUpdatedAtColumn() => $this->related->freshTimestampString()];
        if (count($ids = $this->allRelatedIds()) > 0) {
            $this->getRelated()->newQueryWithoutRelationships()->whereIn($key, $ids)->update($columns);
        }
    }
    public function allRelatedIds()
    {
        return $this->newPivotQuery()->pluck($this->relatedPivotKey);
    }
    public function save(Model $model, array $pivotAttributes = [], $touch = true)
    {
        $model->save(['touch' => false]);
        $this->attach($model, $pivotAttributes, $touch);
        return $model;
    }
    public function saveMany($models, array $pivotAttributes = [])
    {
        foreach ($models as $key => $model) {
            $this->save($model, (array) ($pivotAttributes[$key] ?? []), false);
        }
        $this->touchIfTouching();
        return $models;
    }
    public function create(array $attributes = [], array $joining = [], $touch = true)
    {
        $instance = $this->related->newInstance($attributes);
        $instance->save(['touch' => false]);
        $this->attach($instance, $joining, $touch);
        return $instance;
    }
    public function createMany(iterable $records, array $joinings = [])
    {
        $instances = [];
        foreach ($records as $key => $record) {
            $instances[] = $this->create($record, (array) ($joinings[$key] ?? []), false);
        }
        $this->touchIfTouching();
        return $instances;
    }
    public function getRelationExistenceQuery(Builder $query, Builder $parentQuery, $columns = ['*'])
    {
        if ($parentQuery->getQuery()->from == $query->getQuery()->from) {
            return $this->getRelationExistenceQueryForSelfJoin($query, $parentQuery, $columns);
        }
        $this->performJoin($query);
        return parent::getRelationExistenceQuery($query, $parentQuery, $columns);
    }
    public function getRelationExistenceQueryForSelfJoin(Builder $query, Builder $parentQuery, $columns = ['*'])
    {
        $query->select($columns);
        $query->from($this->related->getTable() . ' as ' . ($hash = $this->getRelationCountHash()));
        $this->related->setTable($hash);
        $this->performJoin($query);
        return parent::getRelationExistenceQuery($query, $parentQuery, $columns);
    }
    public function getExistenceCompareKey()
    {
        return $this->getQualifiedForeignPivotKeyName();
    }
    public function withTimestamps($createdAt = null, $updatedAt = null)
    {
        $this->withTimestamps = true;
        $this->pivotCreatedAt = $createdAt;
        $this->pivotUpdatedAt = $updatedAt;
        return $this->withPivot($this->createdAt(), $this->updatedAt());
    }
    public function createdAt()
    {
        return $this->pivotCreatedAt ?: $this->parent->getCreatedAtColumn();
    }
    public function updatedAt()
    {
        return $this->pivotUpdatedAt ?: $this->parent->getUpdatedAtColumn();
    }
    public function getForeignPivotKeyName()
    {
        return $this->foreignPivotKey;
    }
    public function getQualifiedForeignPivotKeyName()
    {
        return $this->qualifyPivotColumn($this->foreignPivotKey);
    }
    public function getRelatedPivotKeyName()
    {
        return $this->relatedPivotKey;
    }
    public function getQualifiedRelatedPivotKeyName()
    {
        return $this->qualifyPivotColumn($this->relatedPivotKey);
    }
    public function getParentKeyName()
    {
        return $this->parentKey;
    }
    public function getQualifiedParentKeyName()
    {
        return $this->parent->qualifyColumn($this->parentKey);
    }
    public function getRelatedKeyName()
    {
        return $this->relatedKey;
    }
    public function getQualifiedRelatedKeyName()
    {
        return $this->related->qualifyColumn($this->relatedKey);
    }
    public function getTable()
    {
        return $this->table;
    }
    public function getRelationName()
    {
        return $this->relationName;
    }
    public function getPivotAccessor()
    {
        return $this->accessor;
    }
    public function getPivotColumns()
    {
        return $this->pivotColumns;
    }
    public function qualifyPivotColumn($column)
    {
        return Str::contains($column, '.') ? $column : $this->table . '.' . $column;
    }
}
}

namespace Illuminate\Database\Eloquent {
class SoftDeletingScope implements Scope
{
    protected $extensions = ['Restore', 'WithTrashed', 'WithoutTrashed', 'OnlyTrashed'];
    public function apply(Builder $builder, Model $model)
    {
        $builder->whereNull($model->getQualifiedDeletedAtColumn());
    }
    public function extend(Builder $builder)
    {
        foreach ($this->extensions as $extension) {
            $this->{"add{$extension}"}($builder);
        }
        $builder->onDelete(function (Builder $builder) {
            $column = $this->getDeletedAtColumn($builder);
            return $builder->update([$column => $builder->getModel()->freshTimestampString()]);
        });
    }
    protected function getDeletedAtColumn(Builder $builder)
    {
        if (count((array) $builder->getQuery()->joins) > 0) {
            return $builder->getModel()->getQualifiedDeletedAtColumn();
        }
        return $builder->getModel()->getDeletedAtColumn();
    }
    protected function addRestore(Builder $builder)
    {
        $builder->macro('restore', function (Builder $builder) {
            $builder->withTrashed();
            return $builder->update([$builder->getModel()->getDeletedAtColumn() => null]);
        });
    }
    protected function addWithTrashed(Builder $builder)
    {
        $builder->macro('withTrashed', function (Builder $builder, $withTrashed = true) {
            if (!$withTrashed) {
                return $builder->withoutTrashed();
            }
            return $builder->withoutGlobalScope($this);
        });
    }
    protected function addWithoutTrashed(Builder $builder)
    {
        $builder->macro('withoutTrashed', function (Builder $builder) {
            $model = $builder->getModel();
            $builder->withoutGlobalScope($this)->whereNull($model->getQualifiedDeletedAtColumn());
            return $builder;
        });
    }
    protected function addOnlyTrashed(Builder $builder)
    {
        $builder->macro('onlyTrashed', function (Builder $builder) {
            $model = $builder->getModel();
            $builder->withoutGlobalScope($this)->whereNotNull($model->getQualifiedDeletedAtColumn());
            return $builder;
        });
    }
}
}

namespace Illuminate\Database\Eloquent {
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Support\Arr;
class ModelNotFoundException extends RecordsNotFoundException
{
    protected $model;
    protected $ids;
    public function setModel($model, $ids = [])
    {
        $this->model = $model;
        $this->ids = Arr::wrap($ids);
        $this->message = "No query results for model [{$model}]";
        if (count($this->ids) > 0) {
            $this->message .= ' ' . implode(', ', $this->ids);
        } else {
            $this->message .= '.';
        }
        return $this;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function getIds()
    {
        return $this->ids;
    }
}
}

namespace Illuminate\Database\Eloquent {
use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Contracts\Queue\EntityResolver as EntityResolverContract;
class QueueEntityResolver implements EntityResolverContract
{
    public function resolve($type, $id)
    {
        $instance = (new $type())->find($id);
        if ($instance) {
            return $instance;
        }
        throw new EntityNotFoundException($type, $id);
    }
}
}

namespace Illuminate\Database\Eloquent {
trait SoftDeletes
{
    protected $forceDeleting = false;
    public static function bootSoftDeletes()
    {
        static::addGlobalScope(new SoftDeletingScope());
    }
    public function initializeSoftDeletes()
    {
        if (!isset($this->casts[$this->getDeletedAtColumn()])) {
            $this->casts[$this->getDeletedAtColumn()] = 'datetime';
        }
    }
    public function forceDelete()
    {
        $this->forceDeleting = true;
        return tap($this->delete(), function ($deleted) {
            $this->forceDeleting = false;
            if ($deleted) {
                $this->fireModelEvent('forceDeleted', false);
            }
        });
    }
    protected function performDeleteOnModel()
    {
        if ($this->forceDeleting) {
            return tap($this->setKeysForSaveQuery($this->newModelQuery())->forceDelete(), function () {
                $this->exists = false;
            });
        }
        return $this->runSoftDelete();
    }
    protected function runSoftDelete()
    {
        $query = $this->setKeysForSaveQuery($this->newModelQuery());
        $time = $this->freshTimestamp();
        $columns = [$this->getDeletedAtColumn() => $this->fromDateTime($time)];
        $this->{$this->getDeletedAtColumn()} = $time;
        if ($this->timestamps && !is_null($this->getUpdatedAtColumn())) {
            $this->{$this->getUpdatedAtColumn()} = $time;
            $columns[$this->getUpdatedAtColumn()] = $this->fromDateTime($time);
        }
        $query->update($columns);
        $this->syncOriginalAttributes(array_keys($columns));
        $this->fireModelEvent('trashed', false);
    }
    public function restore()
    {
        if ($this->fireModelEvent('restoring') === false) {
            return false;
        }
        $this->{$this->getDeletedAtColumn()} = null;
        $this->exists = true;
        $result = $this->save();
        $this->fireModelEvent('restored', false);
        return $result;
    }
    public function trashed()
    {
        return !is_null($this->{$this->getDeletedAtColumn()});
    }
    public static function softDeleted($callback)
    {
        static::registerModelEvent('trashed', $callback);
    }
    public static function restoring($callback)
    {
        static::registerModelEvent('restoring', $callback);
    }
    public static function restored($callback)
    {
        static::registerModelEvent('restored', $callback);
    }
    public static function forceDeleted($callback)
    {
        static::registerModelEvent('forceDeleted', $callback);
    }
    public function isForceDeleting()
    {
        return $this->forceDeleting;
    }
    public function getDeletedAtColumn()
    {
        return defined('static::DELETED_AT') ? static::DELETED_AT : 'deleted_at';
    }
    public function getQualifiedDeletedAtColumn()
    {
        return $this->qualifyColumn($this->getDeletedAtColumn());
    }
}
}

namespace Illuminate\Database\Eloquent {
use RuntimeException;
class MassAssignmentException extends RuntimeException
{
}
}

namespace Illuminate\Database\Eloquent {
interface Scope
{
    public function apply(Builder $builder, Model $model);
}
}

namespace Illuminate\Database\Eloquent {
use Illuminate\Contracts\Queue\QueueableCollection;
use Illuminate\Contracts\Queue\QueueableEntity;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection as BaseCollection;
use Illuminate\Support\Str;
use LogicException;
class Collection extends BaseCollection implements QueueableCollection
{
    public function find($key, $default = null)
    {
        if ($key instanceof Model) {
            $key = $key->getKey();
        }
        if ($key instanceof Arrayable) {
            $key = $key->toArray();
        }
        if (is_array($key)) {
            if ($this->isEmpty()) {
                return new static();
            }
            return $this->whereIn($this->first()->getKeyName(), $key);
        }
        return Arr::first($this->items, function ($model) use($key) {
            return $model->getKey() == $key;
        }, $default);
    }
    public function load($relations)
    {
        if ($this->isNotEmpty()) {
            if (is_string($relations)) {
                $relations = func_get_args();
            }
            $query = $this->first()->newQueryWithoutRelationships()->with($relations);
            $this->items = $query->eagerLoadRelations($this->items);
        }
        return $this;
    }
    public function loadAggregate($relations, $column, $function = null)
    {
        if ($this->isEmpty()) {
            return $this;
        }
        $models = $this->first()->newModelQuery()->whereKey($this->modelKeys())->select($this->first()->getKeyName())->withAggregate($relations, $column, $function)->get()->keyBy($this->first()->getKeyName());
        $attributes = Arr::except(array_keys($models->first()->getAttributes()), $models->first()->getKeyName());
        $this->each(function ($model) use($models, $attributes) {
            $extraAttributes = Arr::only($models->get($model->getKey())->getAttributes(), $attributes);
            $model->forceFill($extraAttributes)->syncOriginalAttributes($attributes)->mergeCasts($models->get($model->getKey())->getCasts());
        });
        return $this;
    }
    public function loadCount($relations)
    {
        return $this->loadAggregate($relations, '*', 'count');
    }
    public function loadMax($relations, $column)
    {
        return $this->loadAggregate($relations, $column, 'max');
    }
    public function loadMin($relations, $column)
    {
        return $this->loadAggregate($relations, $column, 'min');
    }
    public function loadSum($relations, $column)
    {
        return $this->loadAggregate($relations, $column, 'sum');
    }
    public function loadAvg($relations, $column)
    {
        return $this->loadAggregate($relations, $column, 'avg');
    }
    public function loadExists($relations)
    {
        return $this->loadAggregate($relations, '*', 'exists');
    }
    public function loadMissing($relations)
    {
        if (is_string($relations)) {
            $relations = func_get_args();
        }
        foreach ($relations as $key => $value) {
            if (is_numeric($key)) {
                $key = $value;
            }
            $segments = explode('.', explode(':', $key)[0]);
            if (Str::contains($key, ':')) {
                $segments[count($segments) - 1] .= ':' . explode(':', $key)[1];
            }
            $path = [];
            foreach ($segments as $segment) {
                $path[] = [$segment => $segment];
            }
            if (is_callable($value)) {
                $path[count($segments) - 1][end($segments)] = $value;
            }
            $this->loadMissingRelation($this, $path);
        }
        return $this;
    }
    protected function loadMissingRelation(self $models, array $path)
    {
        $relation = array_shift($path);
        $name = explode(':', key($relation))[0];
        if (is_string(reset($relation))) {
            $relation = reset($relation);
        }
        $models->filter(function ($model) use($name) {
            return !is_null($model) && !$model->relationLoaded($name);
        })->load($relation);
        if (empty($path)) {
            return;
        }
        $models = $models->pluck($name)->whereNotNull();
        if ($models->first() instanceof BaseCollection) {
            $models = $models->collapse();
        }
        $this->loadMissingRelation(new static($models), $path);
    }
    public function loadMorph($relation, $relations)
    {
        $this->pluck($relation)->filter()->groupBy(function ($model) {
            return get_class($model);
        })->each(function ($models, $className) use($relations) {
            static::make($models)->load($relations[$className] ?? []);
        });
        return $this;
    }
    public function loadMorphCount($relation, $relations)
    {
        $this->pluck($relation)->filter()->groupBy(function ($model) {
            return get_class($model);
        })->each(function ($models, $className) use($relations) {
            static::make($models)->loadCount($relations[$className] ?? []);
        });
        return $this;
    }
    public function contains($key, $operator = null, $value = null)
    {
        if (func_num_args() > 1 || $this->useAsCallable($key)) {
            return parent::contains(...func_get_args());
        }
        if ($key instanceof Model) {
            return parent::contains(function ($model) use($key) {
                return $model->is($key);
            });
        }
        return parent::contains(function ($model) use($key) {
            return $model->getKey() == $key;
        });
    }
    public function modelKeys()
    {
        return array_map(function ($model) {
            return $model->getKey();
        }, $this->items);
    }
    public function merge($items)
    {
        $dictionary = $this->getDictionary();
        foreach ($items as $item) {
            $dictionary[$item->getKey()] = $item;
        }
        return new static(array_values($dictionary));
    }
    public function map(callable $callback)
    {
        $result = parent::map($callback);
        return $result->contains(function ($item) {
            return !$item instanceof Model;
        }) ? $result->toBase() : $result;
    }
    public function mapWithKeys(callable $callback)
    {
        $result = parent::mapWithKeys($callback);
        return $result->contains(function ($item) {
            return !$item instanceof Model;
        }) ? $result->toBase() : $result;
    }
    public function fresh($with = [])
    {
        if ($this->isEmpty()) {
            return new static();
        }
        $model = $this->first();
        $freshModels = $model->newQueryWithoutScopes()->with(is_string($with) ? func_get_args() : $with)->whereIn($model->getKeyName(), $this->modelKeys())->get()->getDictionary();
        return $this->filter(function ($model) use($freshModels) {
            return $model->exists && isset($freshModels[$model->getKey()]);
        })->map(function ($model) use($freshModels) {
            return $freshModels[$model->getKey()];
        });
    }
    public function diff($items)
    {
        $diff = new static();
        $dictionary = $this->getDictionary($items);
        foreach ($this->items as $item) {
            if (!isset($dictionary[$item->getKey()])) {
                $diff->add($item);
            }
        }
        return $diff;
    }
    public function intersect($items)
    {
        $intersect = new static();
        if (empty($items)) {
            return $intersect;
        }
        $dictionary = $this->getDictionary($items);
        foreach ($this->items as $item) {
            if (isset($dictionary[$item->getKey()])) {
                $intersect->add($item);
            }
        }
        return $intersect;
    }
    public function unique($key = null, $strict = false)
    {
        if (!is_null($key)) {
            return parent::unique($key, $strict);
        }
        return new static(array_values($this->getDictionary()));
    }
    public function only($keys)
    {
        if (is_null($keys)) {
            return new static($this->items);
        }
        $dictionary = Arr::only($this->getDictionary(), $keys);
        return new static(array_values($dictionary));
    }
    public function except($keys)
    {
        $dictionary = Arr::except($this->getDictionary(), $keys);
        return new static(array_values($dictionary));
    }
    public function makeHidden($attributes)
    {
        return $this->each->makeHidden($attributes);
    }
    public function makeVisible($attributes)
    {
        return $this->each->makeVisible($attributes);
    }
    public function append($attributes)
    {
        return $this->each->append($attributes);
    }
    public function getDictionary($items = null)
    {
        $items = is_null($items) ? $this->items : $items;
        $dictionary = [];
        foreach ($items as $value) {
            $dictionary[$value->getKey()] = $value;
        }
        return $dictionary;
    }
    public function pluck($value, $key = null)
    {
        return $this->toBase()->pluck($value, $key);
    }
    public function keys()
    {
        return $this->toBase()->keys();
    }
    public function zip($items)
    {
        return $this->toBase()->zip(...func_get_args());
    }
    public function collapse()
    {
        return $this->toBase()->collapse();
    }
    public function flatten($depth = INF)
    {
        return $this->toBase()->flatten($depth);
    }
    public function flip()
    {
        return $this->toBase()->flip();
    }
    public function pad($size, $value)
    {
        return $this->toBase()->pad($size, $value);
    }
    protected function duplicateComparator($strict)
    {
        return function ($a, $b) {
            return $a->is($b);
        };
    }
    public function getQueueableClass()
    {
        if ($this->isEmpty()) {
            return;
        }
        $class = get_class($this->first());
        $this->each(function ($model) use($class) {
            if (get_class($model) !== $class) {
                throw new LogicException('Queueing collections with multiple model types is not supported.');
            }
        });
        return $class;
    }
    public function getQueueableIds()
    {
        if ($this->isEmpty()) {
            return [];
        }
        return $this->first() instanceof QueueableEntity ? $this->map->getQueueableId()->all() : $this->modelKeys();
    }
    public function getQueueableRelations()
    {
        if ($this->isEmpty()) {
            return [];
        }
        $relations = $this->map->getQueueableRelations()->all();
        if (count($relations) === 0 || $relations === [[]]) {
            return [];
        } elseif (count($relations) === 1) {
            return reset($relations);
        } else {
            return array_intersect(...array_values($relations));
        }
    }
    public function getQueueableConnection()
    {
        if ($this->isEmpty()) {
            return;
        }
        $connection = $this->first()->getConnectionName();
        $this->each(function ($model) use($connection) {
            if ($model->getConnectionName() !== $connection) {
                throw new LogicException('Queueing collections with multiple model connections is not supported.');
            }
        });
        return $connection;
    }
    public function toQuery()
    {
        $model = $this->first();
        if (!$model) {
            throw new LogicException('Unable to create query for empty collection.');
        }
        $class = get_class($model);
        if ($this->filter(function ($model) use($class) {
            return !$model instanceof $class;
        })->isNotEmpty()) {
            throw new LogicException('Unable to create query for collection with mixed types.');
        }
        return $model->newModelQuery()->whereKey($this->modelKeys());
    }
}
}

namespace Illuminate\Database\Console\Migrations {
use Illuminate\Console\Command;
class BaseCommand extends Command
{
    protected function getMigrationPaths()
    {
        if ($this->input->hasOption('path') && $this->option('path')) {
            return collect($this->option('path'))->map(function ($path) {
                return !$this->usingRealPath() ? $this->laravel->basePath() . '/' . $path : $path;
            })->all();
        }
        return array_merge($this->migrator->paths(), [$this->getMigrationPath()]);
    }
    protected function usingRealPath()
    {
        return $this->input->hasOption('realpath') && $this->option('realpath');
    }
    protected function getMigrationPath()
    {
        return $this->laravel->databasePath() . DIRECTORY_SEPARATOR . 'migrations';
    }
}
}

namespace Illuminate\Database\Console\Migrations {
use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Events\DatabaseRefreshed;
use Symfony\Component\Console\Input\InputOption;
class RefreshCommand extends Command
{
    use ConfirmableTrait;
    protected $name = 'migrate:refresh';
    protected $description = 'Reset and re-run all migrations';
    public function handle()
    {
        if (!$this->confirmToProceed()) {
            return 1;
        }
        $database = $this->input->getOption('database');
        $path = $this->input->getOption('path');
        $step = $this->input->getOption('step') ?: 0;
        if ($step > 0) {
            $this->runRollback($database, $path, $step);
        } else {
            $this->runReset($database, $path);
        }
        $this->call('migrate', array_filter(['--database' => $database, '--path' => $path, '--realpath' => $this->input->getOption('realpath'), '--force' => true]));
        if ($this->laravel->bound(Dispatcher::class)) {
            $this->laravel[Dispatcher::class]->dispatch(new DatabaseRefreshed());
        }
        if ($this->needsSeeding()) {
            $this->runSeeder($database);
        }
        return 0;
    }
    protected function runRollback($database, $path, $step)
    {
        $this->call('migrate:rollback', array_filter(['--database' => $database, '--path' => $path, '--realpath' => $this->input->getOption('realpath'), '--step' => $step, '--force' => true]));
    }
    protected function runReset($database, $path)
    {
        $this->call('migrate:reset', array_filter(['--database' => $database, '--path' => $path, '--realpath' => $this->input->getOption('realpath'), '--force' => true]));
    }
    protected function needsSeeding()
    {
        return $this->option('seed') || $this->option('seeder');
    }
    protected function runSeeder($database)
    {
        $this->call('db:seed', array_filter(['--database' => $database, '--class' => $this->option('seeder') ?: 'Database\\Seeders\\DatabaseSeeder', '--force' => true]));
    }
    protected function getOptions()
    {
        return [['database', null, InputOption::VALUE_OPTIONAL, 'The database connection to use'], ['force', null, InputOption::VALUE_NONE, 'Force the operation to run when in production'], ['path', null, InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, 'The path(s) to the migrations files to be executed'], ['realpath', null, InputOption::VALUE_NONE, 'Indicate any provided migration file paths are pre-resolved absolute paths'], ['seed', null, InputOption::VALUE_NONE, 'Indicates if the seed task should be re-run'], ['seeder', null, InputOption::VALUE_OPTIONAL, 'The class name of the root seeder'], ['step', null, InputOption::VALUE_OPTIONAL, 'The number of migrations to be reverted & re-run']];
    }
}
}

namespace Illuminate\Database\Console\Migrations {
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Events\SchemaLoaded;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Database\SqlServerConnection;
class MigrateCommand extends BaseCommand
{
    use ConfirmableTrait;
    protected $signature = 'migrate {--database= : The database connection to use}
                {--force : Force the operation to run when in production}
                {--path=* : The path(s) to the migrations files to be executed}
                {--realpath : Indicate any provided migration file paths are pre-resolved absolute paths}
                {--schema-path= : The path to a schema dump file}
                {--pretend : Dump the SQL queries that would be run}
                {--seed : Indicates if the seed task should be re-run}
                {--seeder= : The class name of the root seeder}
                {--step : Force the migrations to be run so they can be rolled back individually}';
    protected $description = 'Run the database migrations';
    protected $migrator;
    protected $dispatcher;
    public function __construct(Migrator $migrator, Dispatcher $dispatcher)
    {
        parent::__construct();
        $this->migrator = $migrator;
        $this->dispatcher = $dispatcher;
    }
    public function handle()
    {
        if (!$this->confirmToProceed()) {
            return 1;
        }
        $this->migrator->usingConnection($this->option('database'), function () {
            $this->prepareDatabase();
            $this->migrator->setOutput($this->output)->run($this->getMigrationPaths(), ['pretend' => $this->option('pretend'), 'step' => $this->option('step')]);
            if ($this->option('seed') && !$this->option('pretend')) {
                $this->call('db:seed', ['--class' => $this->option('seeder') ?: 'Database\\Seeders\\DatabaseSeeder', '--force' => true]);
            }
        });
        return 0;
    }
    protected function prepareDatabase()
    {
        if (!$this->migrator->repositoryExists()) {
            $this->call('migrate:install', array_filter(['--database' => $this->option('database')]));
        }
        if (!$this->migrator->hasRunAnyMigrations() && !$this->option('pretend')) {
            $this->loadSchemaState();
        }
    }
    protected function loadSchemaState()
    {
        $connection = $this->migrator->resolveConnection($this->option('database'));
        if ($connection instanceof SqlServerConnection || !is_file($path = $this->schemaPath($connection))) {
            return;
        }
        $this->line('<info>Loading stored database schema:</info> ' . $path);
        $startTime = microtime(true);
        $this->migrator->deleteRepository();
        $connection->getSchemaState()->handleOutputUsing(function ($type, $buffer) {
            $this->output->write($buffer);
        })->load($path);
        $runTime = number_format((microtime(true) - $startTime) * 1000, 2);
        $this->dispatcher->dispatch(new SchemaLoaded($connection, $path));
        $this->line('<info>Loaded stored database schema.</info> (' . $runTime . 'ms)');
    }
    protected function schemaPath($connection)
    {
        if ($this->option('schema-path')) {
            return $this->option('schema-path');
        }
        if (file_exists($path = database_path('schema/' . $connection->getName() . '-schema.dump'))) {
            return $path;
        }
        return database_path('schema/' . $connection->getName() . '-schema.sql');
    }
}
}

namespace Illuminate\Database\Console\Migrations {
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Database\Migrations\Migrator;
use Symfony\Component\Console\Input\InputOption;
class RollbackCommand extends BaseCommand
{
    use ConfirmableTrait;
    protected $name = 'migrate:rollback';
    protected $description = 'Rollback the last database migration';
    protected $migrator;
    public function __construct(Migrator $migrator)
    {
        parent::__construct();
        $this->migrator = $migrator;
    }
    public function handle()
    {
        if (!$this->confirmToProceed()) {
            return 1;
        }
        $this->migrator->usingConnection($this->option('database'), function () {
            $this->migrator->setOutput($this->output)->rollback($this->getMigrationPaths(), ['pretend' => $this->option('pretend'), 'step' => (int) $this->option('step')]);
        });
        return 0;
    }
    protected function getOptions()
    {
        return [['database', null, InputOption::VALUE_OPTIONAL, 'The database connection to use'], ['force', null, InputOption::VALUE_NONE, 'Force the operation to run when in production'], ['path', null, InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, 'The path(s) to the migrations files to be executed'], ['realpath', null, InputOption::VALUE_NONE, 'Indicate any provided migration file paths are pre-resolved absolute paths'], ['pretend', null, InputOption::VALUE_NONE, 'Dump the SQL queries that would be run'], ['step', null, InputOption::VALUE_OPTIONAL, 'The number of migrations to be reverted']];
    }
}
}

namespace Illuminate\Database\Console\Migrations {
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Support\Collection;
use Symfony\Component\Console\Input\InputOption;
class StatusCommand extends BaseCommand
{
    protected $name = 'migrate:status';
    protected $description = 'Show the status of each migration';
    protected $migrator;
    public function __construct(Migrator $migrator)
    {
        parent::__construct();
        $this->migrator = $migrator;
    }
    public function handle()
    {
        return $this->migrator->usingConnection($this->option('database'), function () {
            if (!$this->migrator->repositoryExists()) {
                $this->error('Migration table not found.');
                return 1;
            }
            $ran = $this->migrator->getRepository()->getRan();
            $batches = $this->migrator->getRepository()->getMigrationBatches();
            if (count($migrations = $this->getStatusFor($ran, $batches)) > 0) {
                $this->table(['Ran?', 'Migration', 'Batch'], $migrations);
            } else {
                $this->error('No migrations found');
            }
        });
    }
    protected function getStatusFor(array $ran, array $batches)
    {
        return Collection::make($this->getAllMigrationFiles())->map(function ($migration) use($ran, $batches) {
            $migrationName = $this->migrator->getMigrationName($migration);
            return in_array($migrationName, $ran) ? ['<info>Yes</info>', $migrationName, $batches[$migrationName]] : ['<fg=red>No</fg=red>', $migrationName];
        });
    }
    protected function getAllMigrationFiles()
    {
        return $this->migrator->getMigrationFiles($this->getMigrationPaths());
    }
    protected function getOptions()
    {
        return [['database', null, InputOption::VALUE_OPTIONAL, 'The database connection to use'], ['path', null, InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, 'The path(s) to the migrations files to use'], ['realpath', null, InputOption::VALUE_NONE, 'Indicate any provided migration file paths are pre-resolved absolute paths']];
    }
}
}

namespace Illuminate\Database\Console\Migrations {
use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Support\Composer;
use Illuminate\Support\Str;
class MigrateMakeCommand extends BaseCommand
{
    protected $signature = 'make:migration {name : The name of the migration}
        {--create= : The table to be created}
        {--table= : The table to migrate}
        {--path= : The location where the migration file should be created}
        {--realpath : Indicate any provided migration file paths are pre-resolved absolute paths}
        {--fullpath : Output the full path of the migration}';
    protected $description = 'Create a new migration file';
    protected $creator;
    protected $composer;
    public function __construct(MigrationCreator $creator, Composer $composer)
    {
        parent::__construct();
        $this->creator = $creator;
        $this->composer = $composer;
    }
    public function handle()
    {
        $name = Str::snake(trim($this->input->getArgument('name')));
        $table = $this->input->getOption('table');
        $create = $this->input->getOption('create') ?: false;
        if (!$table && is_string($create)) {
            $table = $create;
            $create = true;
        }
        if (!$table) {
            [$table, $create] = TableGuesser::guess($name);
        }
        $this->writeMigration($name, $table, $create);
        $this->composer->dumpAutoloads();
    }
    protected function writeMigration($name, $table, $create)
    {
        $file = $this->creator->create($name, $this->getMigrationPath(), $table, $create);
        if (!$this->option('fullpath')) {
            $file = pathinfo($file, PATHINFO_FILENAME);
        }
        $this->line("<info>Created Migration:</info> {$file}");
    }
    protected function getMigrationPath()
    {
        if (!is_null($targetPath = $this->input->getOption('path'))) {
            return !$this->usingRealPath() ? $this->laravel->basePath() . '/' . $targetPath : $targetPath;
        }
        return parent::getMigrationPath();
    }
}
}

namespace Illuminate\Database\Console\Migrations {
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Database\Migrations\Migrator;
use Symfony\Component\Console\Input\InputOption;
class ResetCommand extends BaseCommand
{
    use ConfirmableTrait;
    protected $name = 'migrate:reset';
    protected $description = 'Rollback all database migrations';
    protected $migrator;
    public function __construct(Migrator $migrator)
    {
        parent::__construct();
        $this->migrator = $migrator;
    }
    public function handle()
    {
        if (!$this->confirmToProceed()) {
            return 1;
        }
        return $this->migrator->usingConnection($this->option('database'), function () {
            if (!$this->migrator->repositoryExists()) {
                return $this->comment('Migration table not found.');
            }
            $this->migrator->setOutput($this->output)->reset($this->getMigrationPaths(), $this->option('pretend'));
        });
    }
    protected function getOptions()
    {
        return [['database', null, InputOption::VALUE_OPTIONAL, 'The database connection to use'], ['force', null, InputOption::VALUE_NONE, 'Force the operation to run when in production'], ['path', null, InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, 'The path(s) to the migrations files to be executed'], ['realpath', null, InputOption::VALUE_NONE, 'Indicate any provided migration file paths are pre-resolved absolute paths'], ['pretend', null, InputOption::VALUE_NONE, 'Dump the SQL queries that would be run']];
    }
}
}

namespace Illuminate\Database\Console\Migrations {
use Illuminate\Console\Command;
use Illuminate\Database\Migrations\MigrationRepositoryInterface;
use Symfony\Component\Console\Input\InputOption;
class InstallCommand extends Command
{
    protected $name = 'migrate:install';
    protected $description = 'Create the migration repository';
    protected $repository;
    public function __construct(MigrationRepositoryInterface $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }
    public function handle()
    {
        $this->repository->setSource($this->input->getOption('database'));
        $this->repository->createRepository();
        $this->info('Migration table created successfully.');
    }
    protected function getOptions()
    {
        return [['database', null, InputOption::VALUE_OPTIONAL, 'The database connection to use']];
    }
}
}

namespace Illuminate\Database {
use Illuminate\Support\Str;
use Throwable;
trait DetectsLostConnections
{
    protected function causedByLostConnection(Throwable $e)
    {
        $message = $e->getMessage();
        return Str::contains($message, ['server has gone away', 'no connection to the server', 'Lost connection', 'is dead or not enabled', 'Error while sending', 'decryption failed or bad record mac', 'server closed the connection unexpectedly', 'SSL connection has been closed unexpectedly', 'Error writing data to the connection', 'Resource deadlock avoided', 'Transaction() on null', 'child connection forced to terminate due to client_idle_limit', 'query_wait_timeout', 'reset by peer', 'Physical connection is not usable', 'TCP Provider: Error code 0x68', 'ORA-03114', 'Packets out of order. Expected', 'Adaptive Server connection failed', 'Communication link failure', 'connection is no longer usable', 'Login timeout expired', 'SQLSTATE[HY000] [2002] Connection refused', 'running with the --read-only option so it cannot execute this statement', 'The connection is broken and recovery is not possible. The connection is marked by the client driver as unrecoverable. No attempt was made to restore the connection.', 'SQLSTATE[HY000] [2002] php_network_getaddresses: getaddrinfo failed: Try again', 'SQLSTATE[HY000] [2002] php_network_getaddresses: getaddrinfo failed: Name or service not known', 'SQLSTATE[HY000]: General error: 7 SSL SYSCALL error: EOF detected', 'SQLSTATE[HY000] [2002] Connection timed out', 'SSL: Connection timed out', 'SQLSTATE[HY000]: General error: 1105 The last transaction was aborted due to Seamless Scaling. Please retry.', 'Temporary failure in name resolution', 'SSL: Broken pipe', 'SQLSTATE[08S01]: Communication link failure', 'SQLSTATE[08006] [7] could not connect to server: Connection refused Is the server running on host', 'SQLSTATE[HY000]: General error: 7 SSL SYSCALL error: No route to host', 'The client was disconnected by the server because of inactivity. See wait_timeout and interactive_timeout for configuring this behavior.', 'SQLSTATE[08006] [7] could not translate host name', 'TCP Provider: Error code 0x274C']);
    }
}
}

namespace Illuminate\Database {
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Database\Console\Migrations\FreshCommand;
use Illuminate\Database\Console\Migrations\InstallCommand;
use Illuminate\Database\Console\Migrations\MigrateCommand;
use Illuminate\Database\Console\Migrations\MigrateMakeCommand;
use Illuminate\Database\Console\Migrations\RefreshCommand;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Database\Console\Migrations\RollbackCommand;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Database\Migrations\DatabaseMigrationRepository;
use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Support\ServiceProvider;
class MigrationServiceProvider extends ServiceProvider implements DeferrableProvider
{
    protected $commands = ['Migrate' => 'command.migrate', 'MigrateFresh' => 'command.migrate.fresh', 'MigrateInstall' => 'command.migrate.install', 'MigrateRefresh' => 'command.migrate.refresh', 'MigrateReset' => 'command.migrate.reset', 'MigrateRollback' => 'command.migrate.rollback', 'MigrateStatus' => 'command.migrate.status', 'MigrateMake' => 'command.migrate.make'];
    public function register()
    {
        $this->registerRepository();
        $this->registerMigrator();
        $this->registerCreator();
        $this->registerCommands($this->commands);
    }
    protected function registerRepository()
    {
        $this->app->singleton('migration.repository', function ($app) {
            $table = $app['config']['database.migrations'];
            return new DatabaseMigrationRepository($app['db'], $table);
        });
    }
    protected function registerMigrator()
    {
        $this->app->singleton('migrator', function ($app) {
            $repository = $app['migration.repository'];
            return new Migrator($repository, $app['db'], $app['files'], $app['events']);
        });
    }
    protected function registerCreator()
    {
        $this->app->singleton('migration.creator', function ($app) {
            return new MigrationCreator($app['files'], $app->basePath('stubs'));
        });
    }
    protected function registerCommands(array $commands)
    {
        foreach (array_keys($commands) as $command) {
            $this->{"register{$command}Command"}();
        }
        $this->commands(array_values($commands));
    }
    protected function registerMigrateCommand()
    {
        $this->app->singleton('command.migrate', function ($app) {
            return new MigrateCommand($app['migrator'], $app[Dispatcher::class]);
        });
    }
    protected function registerMigrateFreshCommand()
    {
        $this->app->singleton('command.migrate.fresh', function () {
            return new FreshCommand();
        });
    }
    protected function registerMigrateInstallCommand()
    {
        $this->app->singleton('command.migrate.install', function ($app) {
            return new InstallCommand($app['migration.repository']);
        });
    }
    protected function registerMigrateMakeCommand()
    {
        $this->app->singleton('command.migrate.make', function ($app) {
            $creator = $app['migration.creator'];
            $composer = $app['composer'];
            return new MigrateMakeCommand($creator, $composer);
        });
    }
    protected function registerMigrateRefreshCommand()
    {
        $this->app->singleton('command.migrate.refresh', function () {
            return new RefreshCommand();
        });
    }
    protected function registerMigrateResetCommand()
    {
        $this->app->singleton('command.migrate.reset', function ($app) {
            return new ResetCommand($app['migrator']);
        });
    }
    protected function registerMigrateRollbackCommand()
    {
        $this->app->singleton('command.migrate.rollback', function ($app) {
            return new RollbackCommand($app['migrator']);
        });
    }
    protected function registerMigrateStatusCommand()
    {
        $this->app->singleton('command.migrate.status', function ($app) {
            return new StatusCommand($app['migrator']);
        });
    }
    public function provides()
    {
        return array_merge(['migrator', 'migration.repository', 'migration.creator'], array_values($this->commands));
    }
}
}

namespace Illuminate\Database {
use Illuminate\Support\Str;
use PDOException;
use Throwable;
class QueryException extends PDOException
{
    protected $sql;
    protected $bindings;
    public function __construct($sql, array $bindings, Throwable $previous)
    {
        parent::__construct('', 0, $previous);
        $this->sql = $sql;
        $this->bindings = $bindings;
        $this->code = $previous->getCode();
        $this->message = $this->formatMessage($sql, $bindings, $previous);
        if ($previous instanceof PDOException) {
            $this->errorInfo = $previous->errorInfo;
        }
    }
    protected function formatMessage($sql, $bindings, Throwable $previous)
    {
        return $previous->getMessage() . ' (SQL: ' . Str::replaceArray('?', $bindings, $sql) . ')';
    }
    public function getSql()
    {
        return $this->sql;
    }
    public function getBindings()
    {
        return $this->bindings;
    }
}
}

namespace Illuminate\Database {
class ConnectionResolver implements ConnectionResolverInterface
{
    protected $connections = [];
    protected $default;
    public function __construct(array $connections = [])
    {
        foreach ($connections as $name => $connection) {
            $this->addConnection($name, $connection);
        }
    }
    public function connection($name = null)
    {
        if (is_null($name)) {
            $name = $this->getDefaultConnection();
        }
        return $this->connections[$name];
    }
    public function addConnection($name, ConnectionInterface $connection)
    {
        $this->connections[$name] = $connection;
    }
    public function hasConnection($name)
    {
        return isset($this->connections[$name]);
    }
    public function getDefaultConnection()
    {
        return $this->default;
    }
    public function setDefaultConnection($name)
    {
        $this->default = $name;
    }
}
}

namespace Illuminate\Encryption {
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Encryption\Encrypter as EncrypterContract;
use Illuminate\Contracts\Encryption\EncryptException;
use Illuminate\Contracts\Encryption\StringEncrypter;
use RuntimeException;
class Encrypter implements EncrypterContract, StringEncrypter
{
    protected $key;
    protected $cipher;
    private static $supportedCiphers = ['aes-128-cbc' => ['size' => 16, 'aead' => false], 'aes-256-cbc' => ['size' => 32, 'aead' => false], 'aes-128-gcm' => ['size' => 16, 'aead' => true], 'aes-256-gcm' => ['size' => 32, 'aead' => true]];
    public function __construct($key, $cipher = 'aes-128-cbc')
    {
        $key = (string) $key;
        if (!static::supported($key, $cipher)) {
            $ciphers = implode(', ', array_keys(self::$supportedCiphers));
            throw new RuntimeException("Unsupported cipher or incorrect key length. Supported ciphers are: {$ciphers}.");
        }
        $this->key = $key;
        $this->cipher = $cipher;
    }
    public static function supported($key, $cipher)
    {
        if (!isset(self::$supportedCiphers[strtolower($cipher)])) {
            return false;
        }
        return mb_strlen($key, '8bit') === self::$supportedCiphers[strtolower($cipher)]['size'];
    }
    public static function generateKey($cipher)
    {
        return random_bytes(self::$supportedCiphers[strtolower($cipher)]['size'] ?? 32);
    }
    public function encrypt($value, $serialize = true)
    {
        $iv = random_bytes(openssl_cipher_iv_length(strtolower($this->cipher)));
        $tag = '';
        $value = self::$supportedCiphers[strtolower($this->cipher)]['aead'] ? \openssl_encrypt($serialize ? serialize($value) : $value, strtolower($this->cipher), $this->key, 0, $iv, $tag) : \openssl_encrypt($serialize ? serialize($value) : $value, strtolower($this->cipher), $this->key, 0, $iv);
        if ($value === false) {
            throw new EncryptException('Could not encrypt the data.');
        }
        $iv = base64_encode($iv);
        $tag = base64_encode($tag);
        $mac = self::$supportedCiphers[strtolower($this->cipher)]['aead'] ? '' : $this->hash($iv, $value);
        $json = json_encode(compact('iv', 'value', 'mac', 'tag'), JSON_UNESCAPED_SLASHES);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new EncryptException('Could not encrypt the data.');
        }
        return base64_encode($json);
    }
    public function encryptString($value)
    {
        return $this->encrypt($value, false);
    }
    public function decrypt($payload, $unserialize = true)
    {
        $payload = $this->getJsonPayload($payload);
        $iv = base64_decode($payload['iv']);
        $this->ensureTagIsValid($tag = empty($payload['tag']) ? null : base64_decode($payload['tag']));
        $decrypted = \openssl_decrypt($payload['value'], strtolower($this->cipher), $this->key, 0, $iv, $tag ?? '');
        if ($decrypted === false) {
            throw new DecryptException('Could not decrypt the data.');
        }
        return $unserialize ? unserialize($decrypted) : $decrypted;
    }
    public function decryptString($payload)
    {
        return $this->decrypt($payload, false);
    }
    protected function hash($iv, $value)
    {
        return hash_hmac('sha256', $iv . $value, $this->key);
    }
    protected function getJsonPayload($payload)
    {
        $payload = json_decode(base64_decode($payload), true);
        if (!$this->validPayload($payload)) {
            throw new DecryptException('The payload is invalid.');
        }
        if (!self::$supportedCiphers[strtolower($this->cipher)]['aead'] && !$this->validMac($payload)) {
            throw new DecryptException('The MAC is invalid.');
        }
        return $payload;
    }
    protected function validPayload($payload)
    {
        return is_array($payload) && isset($payload['iv'], $payload['value'], $payload['mac']) && strlen(base64_decode($payload['iv'], true)) === openssl_cipher_iv_length(strtolower($this->cipher));
    }
    protected function validMac(array $payload)
    {
        return hash_equals($this->hash($payload['iv'], $payload['value']), $payload['mac']);
    }
    protected function ensureTagIsValid($tag)
    {
        if (self::$supportedCiphers[strtolower($this->cipher)]['aead'] && strlen($tag) !== 16) {
            throw new DecryptException('Could not decrypt the data.');
        }
        if (!self::$supportedCiphers[strtolower($this->cipher)]['aead'] && is_string($tag)) {
            throw new DecryptException('Unable to use tag because the cipher algorithm does not support AEAD.');
        }
    }
    public function getKey()
    {
        return $this->key;
    }
}
}

namespace Illuminate\Encryption {
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\SerializableClosure\SerializableClosure;
use Opis\Closure\SerializableClosure as OpisSerializableClosure;
class EncryptionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerEncrypter();
        $this->registerOpisSecurityKey();
        $this->registerSerializableClosureSecurityKey();
    }
    protected function registerEncrypter()
    {
        $this->app->singleton('encrypter', function ($app) {
            $config = $app->make('config')->get('app');
            return new Encrypter($this->parseKey($config), $config['cipher']);
        });
    }
    protected function registerOpisSecurityKey()
    {
        if (\PHP_VERSION_ID < 80100) {
            $config = $this->app->make('config')->get('app');
            if (!class_exists(OpisSerializableClosure::class) || empty($config['key'])) {
                return;
            }
            OpisSerializableClosure::setSecretKey($this->parseKey($config));
        }
    }
    protected function registerSerializableClosureSecurityKey()
    {
        $config = $this->app->make('config')->get('app');
        if (!class_exists(SerializableClosure::class) || empty($config['key'])) {
            return;
        }
        SerializableClosure::setSecretKey($this->parseKey($config));
    }
    protected function parseKey(array $config)
    {
        if (Str::startsWith($key = $this->key($config), $prefix = 'base64:')) {
            $key = base64_decode(Str::after($key, $prefix));
        }
        return $key;
    }
    protected function key(array $config)
    {
        return tap($config['key'], function ($key) {
            if (empty($key)) {
                throw new MissingAppKeyException();
            }
        });
    }
}
}

namespace Psr\Log {
interface LoggerInterface
{
    public function emergency($message, array $context = array());
    public function alert($message, array $context = array());
    public function critical($message, array $context = array());
    public function error($message, array $context = array());
    public function warning($message, array $context = array());
    public function notice($message, array $context = array());
    public function info($message, array $context = array());
    public function debug($message, array $context = array());
    public function log($level, $message, array $context = array());
}
}

namespace Symfony\Component\Finder {
class SplFileInfo extends \SplFileInfo
{
    private $relativePath;
    private $relativePathname;
    public function __construct(string $file, string $relativePath, string $relativePathname)
    {
        parent::__construct($file);
        $this->relativePath = $relativePath;
        $this->relativePathname = $relativePathname;
    }
    public function getRelativePath()
    {
        return $this->relativePath;
    }
    public function getRelativePathname()
    {
        return $this->relativePathname;
    }
    public function getFilenameWithoutExtension() : string
    {
        $filename = $this->getFilename();
        return pathinfo($filename, \PATHINFO_FILENAME);
    }
    public function getContents()
    {
        set_error_handler(function ($type, $msg) use(&$error) {
            $error = $msg;
        });
        try {
            $content = file_get_contents($this->getPathname());
        } finally {
            restore_error_handler();
        }
        if (false === $content) {
            throw new \RuntimeException($error);
        }
        return $content;
    }
}
}

namespace Symfony\Component\Finder\Iterator {
abstract class MultiplePcreFilterIterator extends \FilterIterator
{
    protected $matchRegexps = [];
    protected $noMatchRegexps = [];
    public function __construct(\Iterator $iterator, array $matchPatterns, array $noMatchPatterns)
    {
        foreach ($matchPatterns as $pattern) {
            $this->matchRegexps[] = $this->toRegex($pattern);
        }
        foreach ($noMatchPatterns as $pattern) {
            $this->noMatchRegexps[] = $this->toRegex($pattern);
        }
        parent::__construct($iterator);
    }
    protected function isAccepted(string $string)
    {
        foreach ($this->noMatchRegexps as $regex) {
            if (preg_match($regex, $string)) {
                return false;
            }
        }
        if ($this->matchRegexps) {
            foreach ($this->matchRegexps as $regex) {
                if (preg_match($regex, $string)) {
                    return true;
                }
            }
            return false;
        }
        return true;
    }
    protected function isRegex(string $str)
    {
        $availableModifiers = 'imsxuADU';
        if (\PHP_VERSION_ID >= 80200) {
            $availableModifiers .= 'n';
        }
        if (preg_match('/^(.{3,}?)[' . $availableModifiers . ']*$/', $str, $m)) {
            $start = substr($m[1], 0, 1);
            $end = substr($m[1], -1);
            if ($start === $end) {
                return !preg_match('/[*?[:alnum:] \\\\]/', $start);
            }
            foreach ([['{', '}'], ['(', ')'], ['[', ']'], ['<', '>']] as $delimiters) {
                if ($start === $delimiters[0] && $end === $delimiters[1]) {
                    return true;
                }
            }
        }
        return false;
    }
    protected abstract function toRegex(string $str);
}
}

namespace Symfony\Component\Finder\Iterator {
class PathFilterIterator extends MultiplePcreFilterIterator
{
    public function accept()
    {
        $filename = $this->current()->getRelativePathname();
        if ('\\' === \DIRECTORY_SEPARATOR) {
            $filename = str_replace('\\', '/', $filename);
        }
        return $this->isAccepted($filename);
    }
    protected function toRegex(string $str)
    {
        return $this->isRegex($str) ? $str : '/' . preg_quote($str, '/') . '/';
    }
}
}

namespace Symfony\Component\Finder\Iterator {
class ExcludeDirectoryFilterIterator extends \FilterIterator implements \RecursiveIterator
{
    private $iterator;
    private $isRecursive;
    private $excludedDirs = [];
    private $excludedPattern;
    public function __construct(\Iterator $iterator, array $directories)
    {
        $this->iterator = $iterator;
        $this->isRecursive = $iterator instanceof \RecursiveIterator;
        $patterns = [];
        foreach ($directories as $directory) {
            $directory = rtrim($directory, '/');
            if (!$this->isRecursive || str_contains($directory, '/')) {
                $patterns[] = preg_quote($directory, '#');
            } else {
                $this->excludedDirs[$directory] = true;
            }
        }
        if ($patterns) {
            $this->excludedPattern = '#(?:^|/)(?:' . implode('|', $patterns) . ')(?:/|$)#';
        }
        parent::__construct($iterator);
    }
    public function accept()
    {
        if ($this->isRecursive && isset($this->excludedDirs[$this->getFilename()]) && $this->isDir()) {
            return false;
        }
        if ($this->excludedPattern) {
            $path = $this->isDir() ? $this->current()->getRelativePathname() : $this->current()->getRelativePath();
            $path = str_replace('\\', '/', $path);
            return !preg_match($this->excludedPattern, $path);
        }
        return true;
    }
    public function hasChildren()
    {
        return $this->isRecursive && $this->iterator->hasChildren();
    }
    public function getChildren()
    {
        $children = new self($this->iterator->getChildren(), []);
        $children->excludedDirs = $this->excludedDirs;
        $children->excludedPattern = $this->excludedPattern;
        return $children;
    }
}
}

namespace Symfony\Component\Finder\Iterator {
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\Finder\SplFileInfo;
class RecursiveDirectoryIterator extends \RecursiveDirectoryIterator
{
    private $ignoreUnreadableDirs;
    private $rewindable;
    private $rootPath;
    private $subPath;
    private $directorySeparator = '/';
    public function __construct(string $path, int $flags, bool $ignoreUnreadableDirs = false)
    {
        if ($flags & (self::CURRENT_AS_PATHNAME | self::CURRENT_AS_SELF)) {
            throw new \RuntimeException('This iterator only support returning current as fileinfo.');
        }
        parent::__construct($path, $flags);
        $this->ignoreUnreadableDirs = $ignoreUnreadableDirs;
        $this->rootPath = $path;
        if ('/' !== \DIRECTORY_SEPARATOR && !($flags & self::UNIX_PATHS)) {
            $this->directorySeparator = \DIRECTORY_SEPARATOR;
        }
    }
    public function current()
    {
        if (null === ($subPathname = $this->subPath)) {
            $subPathname = $this->subPath = $this->getSubPath();
        }
        if ('' !== $subPathname) {
            $subPathname .= $this->directorySeparator;
        }
        $subPathname .= $this->getFilename();
        if ('/' !== ($basePath = $this->rootPath)) {
            $basePath .= $this->directorySeparator;
        }
        return new SplFileInfo($basePath . $subPathname, $this->subPath, $subPathname);
    }
    public function hasChildren($allowLinks = false)
    {
        $hasChildren = parent::hasChildren($allowLinks);
        if (!$hasChildren || !$this->ignoreUnreadableDirs) {
            return $hasChildren;
        }
        try {
            parent::getChildren();
            return true;
        } catch (\UnexpectedValueException $e) {
            return false;
        }
    }
    public function getChildren()
    {
        try {
            $children = parent::getChildren();
            if ($children instanceof self) {
                $children->ignoreUnreadableDirs = $this->ignoreUnreadableDirs;
                $children->rewindable =& $this->rewindable;
                $children->rootPath = $this->rootPath;
            }
            return $children;
        } catch (\UnexpectedValueException $e) {
            throw new AccessDeniedException($e->getMessage(), $e->getCode(), $e);
        }
    }
    public function rewind()
    {
        if (false === $this->isRewindable()) {
            return;
        }
        parent::rewind();
    }
    public function isRewindable()
    {
        if (null !== $this->rewindable) {
            return $this->rewindable;
        }
        if (false !== ($stream = @opendir($this->getPath()))) {
            $infos = stream_get_meta_data($stream);
            closedir($stream);
            if ($infos['seekable']) {
                return $this->rewindable = true;
            }
        }
        return $this->rewindable = false;
    }
}
}

namespace Symfony\Component\Finder\Iterator {
class FileTypeFilterIterator extends \FilterIterator
{
    public const ONLY_FILES = 1;
    public const ONLY_DIRECTORIES = 2;
    private $mode;
    public function __construct(\Iterator $iterator, int $mode)
    {
        $this->mode = $mode;
        parent::__construct($iterator);
    }
    public function accept()
    {
        $fileinfo = $this->current();
        if (self::ONLY_DIRECTORIES === (self::ONLY_DIRECTORIES & $this->mode) && $fileinfo->isFile()) {
            return false;
        } elseif (self::ONLY_FILES === (self::ONLY_FILES & $this->mode) && $fileinfo->isDir()) {
            return false;
        }
        return true;
    }
}
}

namespace Symfony\Component\Finder\Iterator {
use Symfony\Component\Finder\Glob;
class FilenameFilterIterator extends MultiplePcreFilterIterator
{
    public function accept()
    {
        return $this->isAccepted($this->current()->getFilename());
    }
    protected function toRegex(string $str)
    {
        return $this->isRegex($str) ? $str : Glob::toRegex($str);
    }
}
}

namespace Symfony\Component\Finder {
use Symfony\Component\Finder\Comparator\DateComparator;
use Symfony\Component\Finder\Comparator\NumberComparator;
use Symfony\Component\Finder\Exception\DirectoryNotFoundException;
use Symfony\Component\Finder\Iterator\CustomFilterIterator;
use Symfony\Component\Finder\Iterator\DateRangeFilterIterator;
use Symfony\Component\Finder\Iterator\DepthRangeFilterIterator;
use Symfony\Component\Finder\Iterator\ExcludeDirectoryFilterIterator;
use Symfony\Component\Finder\Iterator\FilecontentFilterIterator;
use Symfony\Component\Finder\Iterator\FilenameFilterIterator;
use Symfony\Component\Finder\Iterator\LazyIterator;
use Symfony\Component\Finder\Iterator\SizeRangeFilterIterator;
use Symfony\Component\Finder\Iterator\SortableIterator;
class Finder implements \IteratorAggregate, \Countable
{
    public const IGNORE_VCS_FILES = 1;
    public const IGNORE_DOT_FILES = 2;
    public const IGNORE_VCS_IGNORED_FILES = 4;
    private $mode = 0;
    private $names = [];
    private $notNames = [];
    private $exclude = [];
    private $filters = [];
    private $depths = [];
    private $sizes = [];
    private $followLinks = false;
    private $reverseSorting = false;
    private $sort = false;
    private $ignore = 0;
    private $dirs = [];
    private $dates = [];
    private $iterators = [];
    private $contains = [];
    private $notContains = [];
    private $paths = [];
    private $notPaths = [];
    private $ignoreUnreadableDirs = false;
    private static $vcsPatterns = ['.svn', '_svn', 'CVS', '_darcs', '.arch-params', '.monotone', '.bzr', '.git', '.hg'];
    public function __construct()
    {
        $this->ignore = static::IGNORE_VCS_FILES | static::IGNORE_DOT_FILES;
    }
    public static function create()
    {
        return new static();
    }
    public function directories()
    {
        $this->mode = Iterator\FileTypeFilterIterator::ONLY_DIRECTORIES;
        return $this;
    }
    public function files()
    {
        $this->mode = Iterator\FileTypeFilterIterator::ONLY_FILES;
        return $this;
    }
    public function depth($levels)
    {
        foreach ((array) $levels as $level) {
            $this->depths[] = new Comparator\NumberComparator($level);
        }
        return $this;
    }
    public function date($dates)
    {
        foreach ((array) $dates as $date) {
            $this->dates[] = new Comparator\DateComparator($date);
        }
        return $this;
    }
    public function name($patterns)
    {
        $this->names = array_merge($this->names, (array) $patterns);
        return $this;
    }
    public function notName($patterns)
    {
        $this->notNames = array_merge($this->notNames, (array) $patterns);
        return $this;
    }
    public function contains($patterns)
    {
        $this->contains = array_merge($this->contains, (array) $patterns);
        return $this;
    }
    public function notContains($patterns)
    {
        $this->notContains = array_merge($this->notContains, (array) $patterns);
        return $this;
    }
    public function path($patterns)
    {
        $this->paths = array_merge($this->paths, (array) $patterns);
        return $this;
    }
    public function notPath($patterns)
    {
        $this->notPaths = array_merge($this->notPaths, (array) $patterns);
        return $this;
    }
    public function size($sizes)
    {
        foreach ((array) $sizes as $size) {
            $this->sizes[] = new Comparator\NumberComparator($size);
        }
        return $this;
    }
    public function exclude($dirs)
    {
        $this->exclude = array_merge($this->exclude, (array) $dirs);
        return $this;
    }
    public function ignoreDotFiles(bool $ignoreDotFiles)
    {
        if ($ignoreDotFiles) {
            $this->ignore |= static::IGNORE_DOT_FILES;
        } else {
            $this->ignore &= ~static::IGNORE_DOT_FILES;
        }
        return $this;
    }
    public function ignoreVCS(bool $ignoreVCS)
    {
        if ($ignoreVCS) {
            $this->ignore |= static::IGNORE_VCS_FILES;
        } else {
            $this->ignore &= ~static::IGNORE_VCS_FILES;
        }
        return $this;
    }
    public function ignoreVCSIgnored(bool $ignoreVCSIgnored)
    {
        if ($ignoreVCSIgnored) {
            $this->ignore |= static::IGNORE_VCS_IGNORED_FILES;
        } else {
            $this->ignore &= ~static::IGNORE_VCS_IGNORED_FILES;
        }
        return $this;
    }
    public static function addVCSPattern($pattern)
    {
        foreach ((array) $pattern as $p) {
            self::$vcsPatterns[] = $p;
        }
        self::$vcsPatterns = array_unique(self::$vcsPatterns);
    }
    public function sort(\Closure $closure)
    {
        $this->sort = $closure;
        return $this;
    }
    public function sortByName(bool $useNaturalSort = false)
    {
        $this->sort = $useNaturalSort ? Iterator\SortableIterator::SORT_BY_NAME_NATURAL : Iterator\SortableIterator::SORT_BY_NAME;
        return $this;
    }
    public function sortByType()
    {
        $this->sort = Iterator\SortableIterator::SORT_BY_TYPE;
        return $this;
    }
    public function sortByAccessedTime()
    {
        $this->sort = Iterator\SortableIterator::SORT_BY_ACCESSED_TIME;
        return $this;
    }
    public function reverseSorting()
    {
        $this->reverseSorting = true;
        return $this;
    }
    public function sortByChangedTime()
    {
        $this->sort = Iterator\SortableIterator::SORT_BY_CHANGED_TIME;
        return $this;
    }
    public function sortByModifiedTime()
    {
        $this->sort = Iterator\SortableIterator::SORT_BY_MODIFIED_TIME;
        return $this;
    }
    public function filter(\Closure $closure)
    {
        $this->filters[] = $closure;
        return $this;
    }
    public function followLinks()
    {
        $this->followLinks = true;
        return $this;
    }
    public function ignoreUnreadableDirs(bool $ignore = true)
    {
        $this->ignoreUnreadableDirs = $ignore;
        return $this;
    }
    public function in($dirs)
    {
        $resolvedDirs = [];
        foreach ((array) $dirs as $dir) {
            if (is_dir($dir)) {
                $resolvedDirs[] = [$this->normalizeDir($dir)];
            } elseif ($glob = glob($dir, (\defined('GLOB_BRACE') ? \GLOB_BRACE : 0) | \GLOB_ONLYDIR | \GLOB_NOSORT)) {
                sort($glob);
                $resolvedDirs[] = array_map([$this, 'normalizeDir'], $glob);
            } else {
                throw new DirectoryNotFoundException(sprintf('The "%s" directory does not exist.', $dir));
            }
        }
        $this->dirs = array_merge($this->dirs, ...$resolvedDirs);
        return $this;
    }
    public function getIterator()
    {
        if (0 === \count($this->dirs) && 0 === \count($this->iterators)) {
            throw new \LogicException('You must call one of in() or append() methods before iterating over a Finder.');
        }
        if (1 === \count($this->dirs) && 0 === \count($this->iterators)) {
            $iterator = $this->searchInDirectory($this->dirs[0]);
            if ($this->sort || $this->reverseSorting) {
                $iterator = (new Iterator\SortableIterator($iterator, $this->sort, $this->reverseSorting))->getIterator();
            }
            return $iterator;
        }
        $iterator = new \AppendIterator();
        foreach ($this->dirs as $dir) {
            $iterator->append(new \IteratorIterator(new LazyIterator(function () use($dir) {
                return $this->searchInDirectory($dir);
            })));
        }
        foreach ($this->iterators as $it) {
            $iterator->append($it);
        }
        if ($this->sort || $this->reverseSorting) {
            $iterator = (new Iterator\SortableIterator($iterator, $this->sort, $this->reverseSorting))->getIterator();
        }
        return $iterator;
    }
    public function append(iterable $iterator)
    {
        if ($iterator instanceof \IteratorAggregate) {
            $this->iterators[] = $iterator->getIterator();
        } elseif ($iterator instanceof \Iterator) {
            $this->iterators[] = $iterator;
        } elseif (is_iterable($iterator)) {
            $it = new \ArrayIterator();
            foreach ($iterator as $file) {
                $file = $file instanceof \SplFileInfo ? $file : new \SplFileInfo($file);
                $it[$file->getPathname()] = $file;
            }
            $this->iterators[] = $it;
        } else {
            throw new \InvalidArgumentException('Finder::append() method wrong argument type.');
        }
        return $this;
    }
    public function hasResults()
    {
        foreach ($this->getIterator() as $_) {
            return true;
        }
        return false;
    }
    public function count()
    {
        return iterator_count($this->getIterator());
    }
    private function searchInDirectory(string $dir) : \Iterator
    {
        $exclude = $this->exclude;
        $notPaths = $this->notPaths;
        if (static::IGNORE_VCS_FILES === (static::IGNORE_VCS_FILES & $this->ignore)) {
            $exclude = array_merge($exclude, self::$vcsPatterns);
        }
        if (static::IGNORE_DOT_FILES === (static::IGNORE_DOT_FILES & $this->ignore)) {
            $notPaths[] = '#(^|/)\\..+(/|$)#';
        }
        $minDepth = 0;
        $maxDepth = \PHP_INT_MAX;
        foreach ($this->depths as $comparator) {
            switch ($comparator->getOperator()) {
                case '>':
                    $minDepth = $comparator->getTarget() + 1;
                    break;
                case '>=':
                    $minDepth = $comparator->getTarget();
                    break;
                case '<':
                    $maxDepth = $comparator->getTarget() - 1;
                    break;
                case '<=':
                    $maxDepth = $comparator->getTarget();
                    break;
                default:
                    $minDepth = $maxDepth = $comparator->getTarget();
            }
        }
        $flags = \RecursiveDirectoryIterator::SKIP_DOTS;
        if ($this->followLinks) {
            $flags |= \RecursiveDirectoryIterator::FOLLOW_SYMLINKS;
        }
        $iterator = new Iterator\RecursiveDirectoryIterator($dir, $flags, $this->ignoreUnreadableDirs);
        if ($exclude) {
            $iterator = new Iterator\ExcludeDirectoryFilterIterator($iterator, $exclude);
        }
        $iterator = new \RecursiveIteratorIterator($iterator, \RecursiveIteratorIterator::SELF_FIRST);
        if ($minDepth > 0 || $maxDepth < \PHP_INT_MAX) {
            $iterator = new Iterator\DepthRangeFilterIterator($iterator, $minDepth, $maxDepth);
        }
        if ($this->mode) {
            $iterator = new Iterator\FileTypeFilterIterator($iterator, $this->mode);
        }
        if ($this->names || $this->notNames) {
            $iterator = new Iterator\FilenameFilterIterator($iterator, $this->names, $this->notNames);
        }
        if ($this->contains || $this->notContains) {
            $iterator = new Iterator\FilecontentFilterIterator($iterator, $this->contains, $this->notContains);
        }
        if ($this->sizes) {
            $iterator = new Iterator\SizeRangeFilterIterator($iterator, $this->sizes);
        }
        if ($this->dates) {
            $iterator = new Iterator\DateRangeFilterIterator($iterator, $this->dates);
        }
        if ($this->filters) {
            $iterator = new Iterator\CustomFilterIterator($iterator, $this->filters);
        }
        if ($this->paths || $notPaths) {
            $iterator = new Iterator\PathFilterIterator($iterator, $this->paths, $notPaths);
        }
        if (static::IGNORE_VCS_IGNORED_FILES === (static::IGNORE_VCS_IGNORED_FILES & $this->ignore)) {
            $iterator = new Iterator\VcsIgnoredFilterIterator($iterator, $dir);
        }
        return $iterator;
    }
    private function normalizeDir(string $dir) : string
    {
        if ('/' === $dir) {
            return $dir;
        }
        $dir = rtrim($dir, '/' . \DIRECTORY_SEPARATOR);
        if (preg_match('#^(ssh2\\.)?s?ftp://#', $dir)) {
            $dir .= '/';
        }
        return $dir;
    }
}
}

namespace Symfony\Component\Finder {
class Glob
{
    public static function toRegex(string $glob, bool $strictLeadingDot = true, bool $strictWildcardSlash = true, string $delimiter = '#')
    {
        $firstByte = true;
        $escaping = false;
        $inCurlies = 0;
        $regex = '';
        $sizeGlob = \strlen($glob);
        for ($i = 0; $i < $sizeGlob; ++$i) {
            $car = $glob[$i];
            if ($firstByte && $strictLeadingDot && '.' !== $car) {
                $regex .= '(?=[^\\.])';
            }
            $firstByte = '/' === $car;
            if ($firstByte && $strictWildcardSlash && isset($glob[$i + 2]) && '**' === $glob[$i + 1] . $glob[$i + 2] && (!isset($glob[$i + 3]) || '/' === $glob[$i + 3])) {
                $car = '[^/]++/';
                if (!isset($glob[$i + 3])) {
                    $car .= '?';
                }
                if ($strictLeadingDot) {
                    $car = '(?=[^\\.])' . $car;
                }
                $car = '/(?:' . $car . ')*';
                $i += 2 + isset($glob[$i + 3]);
                if ('/' === $delimiter) {
                    $car = str_replace('/', '\\/', $car);
                }
            }
            if ($delimiter === $car || '.' === $car || '(' === $car || ')' === $car || '|' === $car || '+' === $car || '^' === $car || '$' === $car) {
                $regex .= "\\{$car}";
            } elseif ('*' === $car) {
                $regex .= $escaping ? '\\*' : ($strictWildcardSlash ? '[^/]*' : '.*');
            } elseif ('?' === $car) {
                $regex .= $escaping ? '\\?' : ($strictWildcardSlash ? '[^/]' : '.');
            } elseif ('{' === $car) {
                $regex .= $escaping ? '\\{' : '(';
                if (!$escaping) {
                    ++$inCurlies;
                }
            } elseif ('}' === $car && $inCurlies) {
                $regex .= $escaping ? '}' : ')';
                if (!$escaping) {
                    --$inCurlies;
                }
            } elseif (',' === $car && $inCurlies) {
                $regex .= $escaping ? ',' : '|';
            } elseif ('\\' === $car) {
                if ($escaping) {
                    $regex .= '\\\\';
                    $escaping = false;
                } else {
                    $escaping = true;
                }
                continue;
            } else {
                $regex .= $car;
            }
            $escaping = false;
        }
        return $delimiter . '^' . $regex . '$' . $delimiter;
    }
}
}

namespace Carbon {
use Carbon\Traits\Date;
use Carbon\Traits\DeprecatedProperties;
use DateTime;
use DateTimeInterface;
use DateTimeZone;
class Carbon extends DateTime implements CarbonInterface
{
    use Date;
    public static function isMutable()
    {
        return true;
    }
}
}

namespace FastRoute\RouteParser {
use FastRoute\BadRouteException;
use FastRoute\RouteParser;
class Std implements RouteParser
{
    const VARIABLE_REGEX = <<<'REGEX'
\{
    \s* ([a-zA-Z_][a-zA-Z0-9_-]*) \s*
    (?:
        : \s* ([^{}]*(?:\{(?-1)\}[^{}]*)*)
    )?
\}
REGEX;
    const DEFAULT_DISPATCH_REGEX = '[^/]+';
    public function parse($route)
    {
        $routeWithoutClosingOptionals = rtrim($route, ']');
        $numOptionals = strlen($route) - strlen($routeWithoutClosingOptionals);
        $segments = preg_split('~' . self::VARIABLE_REGEX . '(*SKIP)(*F) | \\[~x', $routeWithoutClosingOptionals);
        if ($numOptionals !== count($segments) - 1) {
            if (preg_match('~' . self::VARIABLE_REGEX . '(*SKIP)(*F) | \\]~x', $routeWithoutClosingOptionals)) {
                throw new BadRouteException('Optional segments can only occur at the end of a route');
            }
            throw new BadRouteException("Number of opening '[' and closing ']' does not match");
        }
        $currentRoute = '';
        $routeDatas = [];
        foreach ($segments as $n => $segment) {
            if ($segment === '' && $n !== 0) {
                throw new BadRouteException('Empty optional part');
            }
            $currentRoute .= $segment;
            $routeDatas[] = $this->parsePlaceholders($currentRoute);
        }
        return $routeDatas;
    }
    private function parsePlaceholders($route)
    {
        if (!preg_match_all('~' . self::VARIABLE_REGEX . '~x', $route, $matches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER)) {
            return [$route];
        }
        $offset = 0;
        $routeData = [];
        foreach ($matches as $set) {
            if ($set[0][1] > $offset) {
                $routeData[] = substr($route, $offset, $set[0][1] - $offset);
            }
            $routeData[] = [$set[1][0], isset($set[2]) ? trim($set[2][0]) : self::DEFAULT_DISPATCH_REGEX];
            $offset = $set[0][1] + strlen($set[0][0]);
        }
        if ($offset !== strlen($route)) {
            $routeData[] = substr($route, $offset);
        }
        return $routeData;
    }
}
}

namespace FastRoute {
class BadRouteException extends \LogicException
{
}
}

namespace FastRoute\DataGenerator {
use FastRoute\BadRouteException;
use FastRoute\DataGenerator;
use FastRoute\Route;
abstract class RegexBasedAbstract implements DataGenerator
{
    protected $staticRoutes = [];
    protected $methodToRegexToRoutesMap = [];
    protected abstract function getApproxChunkSize();
    protected abstract function processChunk($regexToRoutesMap);
    public function addRoute($httpMethod, $routeData, $handler)
    {
        if ($this->isStaticRoute($routeData)) {
            $this->addStaticRoute($httpMethod, $routeData, $handler);
        } else {
            $this->addVariableRoute($httpMethod, $routeData, $handler);
        }
    }
    public function getData()
    {
        if (empty($this->methodToRegexToRoutesMap)) {
            return [$this->staticRoutes, []];
        }
        return [$this->staticRoutes, $this->generateVariableRouteData()];
    }
    private function generateVariableRouteData()
    {
        $data = [];
        foreach ($this->methodToRegexToRoutesMap as $method => $regexToRoutesMap) {
            $chunkSize = $this->computeChunkSize(count($regexToRoutesMap));
            $chunks = array_chunk($regexToRoutesMap, $chunkSize, true);
            $data[$method] = array_map([$this, 'processChunk'], $chunks);
        }
        return $data;
    }
    private function computeChunkSize($count)
    {
        $numParts = max(1, round($count / $this->getApproxChunkSize()));
        return (int) ceil($count / $numParts);
    }
    private function isStaticRoute($routeData)
    {
        return count($routeData) === 1 && is_string($routeData[0]);
    }
    private function addStaticRoute($httpMethod, $routeData, $handler)
    {
        $routeStr = $routeData[0];
        if (isset($this->staticRoutes[$httpMethod][$routeStr])) {
            throw new BadRouteException(sprintf('Cannot register two routes matching "%s" for method "%s"', $routeStr, $httpMethod));
        }
        if (isset($this->methodToRegexToRoutesMap[$httpMethod])) {
            foreach ($this->methodToRegexToRoutesMap[$httpMethod] as $route) {
                if ($route->matches($routeStr)) {
                    throw new BadRouteException(sprintf('Static route "%s" is shadowed by previously defined variable route "%s" for method "%s"', $routeStr, $route->regex, $httpMethod));
                }
            }
        }
        $this->staticRoutes[$httpMethod][$routeStr] = $handler;
    }
    private function addVariableRoute($httpMethod, $routeData, $handler)
    {
        list($regex, $variables) = $this->buildRegexForRoute($routeData);
        if (isset($this->methodToRegexToRoutesMap[$httpMethod][$regex])) {
            throw new BadRouteException(sprintf('Cannot register two routes matching "%s" for method "%s"', $regex, $httpMethod));
        }
        $this->methodToRegexToRoutesMap[$httpMethod][$regex] = new Route($httpMethod, $handler, $regex, $variables);
    }
    private function buildRegexForRoute($routeData)
    {
        $regex = '';
        $variables = [];
        foreach ($routeData as $part) {
            if (is_string($part)) {
                $regex .= preg_quote($part, '~');
                continue;
            }
            list($varName, $regexPart) = $part;
            if (isset($variables[$varName])) {
                throw new BadRouteException(sprintf('Cannot use the same placeholder "%s" twice', $varName));
            }
            if ($this->regexHasCapturingGroups($regexPart)) {
                throw new BadRouteException(sprintf('Regex "%s" for parameter "%s" contains a capturing group', $regexPart, $varName));
            }
            $variables[$varName] = $varName;
            $regex .= '(' . $regexPart . ')';
        }
        return [$regex, $variables];
    }
    private function regexHasCapturingGroups($regex)
    {
        if (false === strpos($regex, '(')) {
            return false;
        }
        return (bool) preg_match('~
                (?:
                    \\(\\?\\(
                  | \\[ [^\\]\\\\]* (?: \\\\ . [^\\]\\\\]* )* \\]
                  | \\\\ .
                ) (*SKIP)(*FAIL) |
                \\(
                (?!
                    \\? (?! <(?![!=]) | P< | \' )
                  | \\*
                )
            ~x', $regex);
    }
}
}

namespace FastRoute\DataGenerator {
class MarkBased extends RegexBasedAbstract
{
    protected function getApproxChunkSize()
    {
        return 30;
    }
    protected function processChunk($regexToRoutesMap)
    {
        $routeMap = [];
        $regexes = [];
        $markName = 'a';
        foreach ($regexToRoutesMap as $regex => $route) {
            $regexes[] = $regex . '(*MARK:' . $markName . ')';
            $routeMap[$markName] = [$route->handler, $route->variables];
            ++$markName;
        }
        $regex = '~^(?|' . implode('|', $regexes) . ')$~';
        return ['regex' => $regex, 'routeMap' => $routeMap];
    }
}
}

namespace FastRoute\DataGenerator {
class GroupPosBased extends RegexBasedAbstract
{
    protected function getApproxChunkSize()
    {
        return 10;
    }
    protected function processChunk($regexToRoutesMap)
    {
        $routeMap = [];
        $regexes = [];
        $offset = 1;
        foreach ($regexToRoutesMap as $regex => $route) {
            $regexes[] = $regex;
            $routeMap[$offset] = [$route->handler, $route->variables];
            $offset += count($route->variables);
        }
        $regex = '~^(?:' . implode('|', $regexes) . ')$~';
        return ['regex' => $regex, 'routeMap' => $routeMap];
    }
}
}

namespace FastRoute\DataGenerator {
class GroupCountBased extends RegexBasedAbstract
{
    protected function getApproxChunkSize()
    {
        return 10;
    }
    protected function processChunk($regexToRoutesMap)
    {
        $routeMap = [];
        $regexes = [];
        $numGroups = 0;
        foreach ($regexToRoutesMap as $regex => $route) {
            $numVariables = count($route->variables);
            $numGroups = max($numGroups, $numVariables);
            $regexes[] = $regex . str_repeat('()', $numGroups - $numVariables);
            $routeMap[$numGroups + 1] = [$route->handler, $route->variables];
            ++$numGroups;
        }
        $regex = '~^(?|' . implode('|', $regexes) . ')$~';
        return ['regex' => $regex, 'routeMap' => $routeMap];
    }
}
}

namespace FastRoute\DataGenerator {
class CharCountBased extends RegexBasedAbstract
{
    protected function getApproxChunkSize()
    {
        return 30;
    }
    protected function processChunk($regexToRoutesMap)
    {
        $routeMap = [];
        $regexes = [];
        $suffixLen = 0;
        $suffix = '';
        $count = count($regexToRoutesMap);
        foreach ($regexToRoutesMap as $regex => $route) {
            $suffixLen++;
            $suffix .= "\t";
            $regexes[] = '(?:' . $regex . '/(\\t{' . $suffixLen . '})\\t{' . ($count - $suffixLen) . '})';
            $routeMap[$suffix] = [$route->handler, $route->variables];
        }
        $regex = '~^(?|' . implode('|', $regexes) . ')$~';
        return ['regex' => $regex, 'suffix' => '/' . $suffix, 'routeMap' => $routeMap];
    }
}
}

namespace FastRoute {
class RouteCollector
{
    protected $routeParser;
    protected $dataGenerator;
    protected $currentGroupPrefix;
    public function __construct(RouteParser $routeParser, DataGenerator $dataGenerator)
    {
        $this->routeParser = $routeParser;
        $this->dataGenerator = $dataGenerator;
        $this->currentGroupPrefix = '';
    }
    public function addRoute($httpMethod, $route, $handler)
    {
        $route = $this->currentGroupPrefix . $route;
        $routeDatas = $this->routeParser->parse($route);
        foreach ((array) $httpMethod as $method) {
            foreach ($routeDatas as $routeData) {
                $this->dataGenerator->addRoute($method, $routeData, $handler);
            }
        }
    }
    public function addGroup($prefix, callable $callback)
    {
        $previousGroupPrefix = $this->currentGroupPrefix;
        $this->currentGroupPrefix = $previousGroupPrefix . $prefix;
        $callback($this);
        $this->currentGroupPrefix = $previousGroupPrefix;
    }
    public function get($route, $handler)
    {
        $this->addRoute('GET', $route, $handler);
    }
    public function post($route, $handler)
    {
        $this->addRoute('POST', $route, $handler);
    }
    public function put($route, $handler)
    {
        $this->addRoute('PUT', $route, $handler);
    }
    public function delete($route, $handler)
    {
        $this->addRoute('DELETE', $route, $handler);
    }
    public function patch($route, $handler)
    {
        $this->addRoute('PATCH', $route, $handler);
    }
    public function head($route, $handler)
    {
        $this->addRoute('HEAD', $route, $handler);
    }
    public function getData()
    {
        return $this->dataGenerator->getData();
    }
}
}

namespace FastRoute {
class Route
{
    public $httpMethod;
    public $regex;
    public $variables;
    public $handler;
    public function __construct($httpMethod, $handler, $regex, $variables)
    {
        $this->httpMethod = $httpMethod;
        $this->handler = $handler;
        $this->regex = $regex;
        $this->variables = $variables;
    }
    public function matches($str)
    {
        $regex = '~^' . $this->regex . '$~';
        return (bool) preg_match($regex, $str);
    }
}
}

namespace FastRoute {
interface DataGenerator
{
    public function addRoute($httpMethod, $routeData, $handler);
    public function getData();
}
}

namespace FastRoute {
interface RouteParser
{
    public function parse($route);
}
}

namespace FastRoute {
interface Dispatcher
{
    const NOT_FOUND = 0;
    const FOUND = 1;
    const METHOD_NOT_ALLOWED = 2;
    public function dispatch($httpMethod, $uri);
}
}

namespace FastRoute\Dispatcher {
use FastRoute\Dispatcher;
abstract class RegexBasedAbstract implements Dispatcher
{
    protected $staticRouteMap = [];
    protected $variableRouteData = [];
    protected abstract function dispatchVariableRoute($routeData, $uri);
    public function dispatch($httpMethod, $uri)
    {
        if (isset($this->staticRouteMap[$httpMethod][$uri])) {
            $handler = $this->staticRouteMap[$httpMethod][$uri];
            return [self::FOUND, $handler, []];
        }
        $varRouteData = $this->variableRouteData;
        if (isset($varRouteData[$httpMethod])) {
            $result = $this->dispatchVariableRoute($varRouteData[$httpMethod], $uri);
            if ($result[0] === self::FOUND) {
                return $result;
            }
        }
        if ($httpMethod === 'HEAD') {
            if (isset($this->staticRouteMap['GET'][$uri])) {
                $handler = $this->staticRouteMap['GET'][$uri];
                return [self::FOUND, $handler, []];
            }
            if (isset($varRouteData['GET'])) {
                $result = $this->dispatchVariableRoute($varRouteData['GET'], $uri);
                if ($result[0] === self::FOUND) {
                    return $result;
                }
            }
        }
        if (isset($this->staticRouteMap['*'][$uri])) {
            $handler = $this->staticRouteMap['*'][$uri];
            return [self::FOUND, $handler, []];
        }
        if (isset($varRouteData['*'])) {
            $result = $this->dispatchVariableRoute($varRouteData['*'], $uri);
            if ($result[0] === self::FOUND) {
                return $result;
            }
        }
        $allowedMethods = [];
        foreach ($this->staticRouteMap as $method => $uriMap) {
            if ($method !== $httpMethod && isset($uriMap[$uri])) {
                $allowedMethods[] = $method;
            }
        }
        foreach ($varRouteData as $method => $routeData) {
            if ($method === $httpMethod) {
                continue;
            }
            $result = $this->dispatchVariableRoute($routeData, $uri);
            if ($result[0] === self::FOUND) {
                $allowedMethods[] = $method;
            }
        }
        if ($allowedMethods) {
            return [self::METHOD_NOT_ALLOWED, $allowedMethods];
        }
        return [self::NOT_FOUND];
    }
}
}

namespace FastRoute\Dispatcher {
class MarkBased extends RegexBasedAbstract
{
    public function __construct($data)
    {
        list($this->staticRouteMap, $this->variableRouteData) = $data;
    }
    protected function dispatchVariableRoute($routeData, $uri)
    {
        foreach ($routeData as $data) {
            if (!preg_match($data['regex'], $uri, $matches)) {
                continue;
            }
            list($handler, $varNames) = $data['routeMap'][$matches['MARK']];
            $vars = [];
            $i = 0;
            foreach ($varNames as $varName) {
                $vars[$varName] = $matches[++$i];
            }
            return [self::FOUND, $handler, $vars];
        }
        return [self::NOT_FOUND];
    }
}
}

namespace FastRoute\Dispatcher {
class GroupPosBased extends RegexBasedAbstract
{
    public function __construct($data)
    {
        list($this->staticRouteMap, $this->variableRouteData) = $data;
    }
    protected function dispatchVariableRoute($routeData, $uri)
    {
        foreach ($routeData as $data) {
            if (!preg_match($data['regex'], $uri, $matches)) {
                continue;
            }
            for ($i = 1; '' === $matches[$i]; ++$i) {
            }
            list($handler, $varNames) = $data['routeMap'][$i];
            $vars = [];
            foreach ($varNames as $varName) {
                $vars[$varName] = $matches[$i++];
            }
            return [self::FOUND, $handler, $vars];
        }
        return [self::NOT_FOUND];
    }
}
}

namespace FastRoute\Dispatcher {
class GroupCountBased extends RegexBasedAbstract
{
    public function __construct($data)
    {
        list($this->staticRouteMap, $this->variableRouteData) = $data;
    }
    protected function dispatchVariableRoute($routeData, $uri)
    {
        foreach ($routeData as $data) {
            if (!preg_match($data['regex'], $uri, $matches)) {
                continue;
            }
            list($handler, $varNames) = $data['routeMap'][count($matches)];
            $vars = [];
            $i = 0;
            foreach ($varNames as $varName) {
                $vars[$varName] = $matches[++$i];
            }
            return [self::FOUND, $handler, $vars];
        }
        return [self::NOT_FOUND];
    }
}
}

namespace FastRoute\Dispatcher {
class CharCountBased extends RegexBasedAbstract
{
    public function __construct($data)
    {
        list($this->staticRouteMap, $this->variableRouteData) = $data;
    }
    protected function dispatchVariableRoute($routeData, $uri)
    {
        foreach ($routeData as $data) {
            if (!preg_match($data['regex'], $uri . $data['suffix'], $matches)) {
                continue;
            }
            list($handler, $varNames) = $data['routeMap'][end($matches)];
            $vars = [];
            $i = 0;
            foreach ($varNames as $varName) {
                $vars[$varName] = $matches[++$i];
            }
            return [self::FOUND, $handler, $vars];
        }
        return [self::NOT_FOUND];
    }
}
}

namespace FastRoute {
if (!function_exists('FastRoute\\simpleDispatcher')) {
    function simpleDispatcher(callable $routeDefinitionCallback, array $options = [])
    {
        $options += ['routeParser' => 'FastRoute\\RouteParser\\Std', 'dataGenerator' => 'FastRoute\\DataGenerator\\GroupCountBased', 'dispatcher' => 'FastRoute\\Dispatcher\\GroupCountBased', 'routeCollector' => 'FastRoute\\RouteCollector'];
        $routeCollector = new $options['routeCollector'](new $options['routeParser'](), new $options['dataGenerator']());
        $routeDefinitionCallback($routeCollector);
        return new $options['dispatcher']($routeCollector->getData());
    }
    function cachedDispatcher(callable $routeDefinitionCallback, array $options = [])
    {
        $options += ['routeParser' => 'FastRoute\\RouteParser\\Std', 'dataGenerator' => 'FastRoute\\DataGenerator\\GroupCountBased', 'dispatcher' => 'FastRoute\\Dispatcher\\GroupCountBased', 'routeCollector' => 'FastRoute\\RouteCollector', 'cacheDisabled' => false];
        if (!isset($options['cacheFile'])) {
            throw new \LogicException('Must specify "cacheFile" option');
        }
        if (!$options['cacheDisabled'] && file_exists($options['cacheFile'])) {
            $dispatchData = (require $options['cacheFile']);
            if (!is_array($dispatchData)) {
                throw new \RuntimeException('Invalid cache file "' . $options['cacheFile'] . '"');
            }
            return new $options['dispatcher']($dispatchData);
        }
        $routeCollector = new $options['routeCollector'](new $options['routeParser'](), new $options['dataGenerator']());
        $routeDefinitionCallback($routeCollector);
        $dispatchData = $routeCollector->getData();
        if (!$options['cacheDisabled']) {
            file_put_contents($options['cacheFile'], '<?php return ' . var_export($dispatchData, true) . ';');
        }
        return new $options['dispatcher']($dispatchData);
    }
}
}

