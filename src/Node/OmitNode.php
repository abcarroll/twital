<?php
namespace Goetas\Twital\Node;

use Goetas\Twital\Node;
use Goetas\Twital\Compiler;
use Goetas\Twital\Helper\DOMHelper;
use Goetas\Twital\Twital;

/**
 *
 * @author Asmir Mustafic <goetas@gmail.com>
 *
 */
class OmitNode implements Node
{
    public function visit(\DOMElement $node, Compiler $context)
    {
        $sandbox = $node->ownerDocument->createElementNS(Twital::NS, "sandbox");

        $node->parentNode->insertBefore($sandbox, $node);
        $node->parentNode->removeChild($node);
        $sandbox->appendChild($node);

        $context->compileAttributes($node);
        $context->compileChilds($node);

        DOMHelper::replaceWithSet($sandbox, iterator_to_array($sandbox->childNodes));
        DOMHelper::replaceWithSet($node, iterator_to_array($node->childNodes));
    }
}
