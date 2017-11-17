<?php
interface Chargeable {
	public function getPrice();
}

interface IdentityObject {
	public function generateId();
}