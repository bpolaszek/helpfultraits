<?php
namespace BenTools\HelpfulTraits\Symfony;

trait SecurityAwareTrait
{

    use AuthorizationCheckerAwareTrait, TokenStorageAwareTrait;
}
